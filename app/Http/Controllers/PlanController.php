<?php

namespace App\Http\Controllers;

use App\Plan;
use App\User;
use App\Status;
use App\Promocode;
use App\PlanTransaction;
use App\Mail\ReportAdmin;
use App\Mail\UserBuyPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class PlanController extends Controller
{
    public function BuyPlan($input)
    {
        $arr = array();

        //check if user already has a plan 
        $objPlanTransaction = new PlanTransaction();
        $arrPlanTrans = $objPlanTransaction->checkUserPlan($input['user_id']);

        foreach ($arrPlanTrans as $obj) {
            if ($input['from'] <= $obj['to']) {
                $arr['sign date'] = $input['from'];
                $arr['plan date'] = $obj['to'];
                return false;
            }
        }

        // save user plan
        $input['from'] = Carbon::parse($input['from'])->format('Y-m-d');
        $input['to'] = Carbon::parse($input['to'])->format('Y-m-d');
        $result = PlanTransaction::create($input);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function GetToken()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api-gateway.ngenius-payments.com/identity/auth/access-token',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{

            "realname":"ni"
        }',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic YmFkY2EzNDMtOWY4NS00YjM5LTk0YzktNGIyNjY3YTBjOGI3OmQxMzc3YWUxLWU5MmMtNDllZi04OWZiLTNkYTBlMGQwOTA5Yw==',
                'Content-Type: application/vnd.ni-identity.v1+json'
            ),
        ));

        $response1 = curl_exec($curl);
        $result = json_decode($response1);
        return $result;
    }

    public function CallBanktoPay($json)
    {
        $result = $this->GetToken();
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api-gateway.ngenius-payments.com/transactions/outlets/82dedef0-9eca-425a-9cf8-239d9c32968b/orders',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $json,
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $result->access_token . '',
                'Content-Type: application/vnd.ni-payment.v2+json',
                'Accept: application/vnd.ni-payment.v2+json'
            ),
        ));

        $response = curl_exec($curl);
        $result1 = json_decode($response);
        return $result1;
    }

    public function BankPayment(Request $request)
    {
        $input = $request->all();

        $objPlan = new Plan();
        $objPlan->getPlaneById($input['plan_id']);

        $objUser = new User();
        $user = $objUser->getUserById($input['user_id']);

        $planPrice = $input['price'] * 100;

        $arrPaymentData = [
            'action' => 'SALE',
            'amount' => [
                'currencyCode' => 'AED',
                'value' => $planPrice,

            ],
            'merchantAttributes' => [

                'redirectUrl' => 'https://utritionlife.com/#/successful-plan-purchase',

                'skipConfirmationPage' => true,

            ],

            'emailAddress' => $user['email'],

            'billingAddress' => [

                'firstName' => $user['name'],

                'lastName' => $user['name'],

                'address1' => 'customer_address',

                'city' => 'united_arab_emirate',

                'countryCode' => 'AED',

            ],
        ];

        $json = json_encode($arrPaymentData);
        //call bank to get page of card payment
        $result1 = $this->CallBanktoPay($json);

        if ($result1->_embedded->payment[0]->state == "STARTED") {
            $input['ref_code'] = $result1->reference;
            $input['payment_status'] = $result1->_embedded->payment[0]->state;
            $resultBuyPlan = $this->BuyPlan($input);

            if (!$resultBuyPlan) {
                $arr = Status::mergeStatus([], 5016);
            }

            $arr['data'] = $result1;
            $arr['rootPay'] = $result1->_links->payment->href;
            $arr['refcode'] = $result1->reference;
            $arr = Status::mergeStatus($arr, 200);
        } else {
            $arr = Status::mergeStatus([], 5020);
        }

        return $arr;
    }

    public function GetPaymentStatus(Request $request)
    {
        $input = $request->all();

        $objPlanTrans = new PlanTransaction();
        $UserPlan = $objPlanTrans->getLastTranstoUser($input['user_id']);

        $objPromocode = new Promocode();
        $promoValue = $objPromocode->getPromoCodeValuebyId($UserPlan[0]['promocode_id']);

        $objPlan = new Plan();
        $Plan = $objPlan->getPlaneById($UserPlan[0]['plan_id']);

        $objUser = new User();
        $user = $objUser->getUserById($input['user_id']);
        $result = $this->GetToken();
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api-gateway.ngenius-payments.com/transactions/outlets/6fe940ad-f77d-42c0-b96e-e1f885d01f61/orders/' . $UserPlan[0]['ref_code'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $result->access_token . ''
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $result = json_decode($response);

        if (isset($result->_embedded->payment[0]->state) && $result->_embedded->payment[0]->state == "CAPTURED") {
            $data = array(
                'name'    => $user['name'],
                'email'   => $user['email'],
                'mobile' => $user['phone'],
                'meal_name' => $Plan['name'],
                'price' => $UserPlan[0]['price'],
                'promo_value' => $promoValue[0]['value'],
                'img' => env('App_Media_URL') . $Plan['feature_img']

            );

            $objPlanTrans->updateStatus($result->_embedded->payment[0]->state, $input['user_id']);
            Mail::to($data['email'])->send(new UserBuyPlan($data));
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ReportAdmin($data));

            $arr['data'] = $input;
            $arr = Status::mergeStatus($arr, 200);
        } else {
            $arr['data'] = $input;
            $arr = Status::mergeStatus($arr, 5016);
        }

        return $arr;
    }

    public function ListPlan()
    {
        $objPlan = new Plan();
        $result = $objPlan->listPlane();

        $arr['data'] = $result;
        $arr['color'] = ['first', 'second', 'third'];
        $arr = Status::mergeStatus($arr, 200);
        return $arr;
    }

    public function GetPlanebyId($plan_id)
    {
        $objPlan = new Plan();
        $plan = $objPlan->getPlaneById($plan_id);

        $arr['data'] = $plan;
        $arr = Status::mergeStatus($arr, 200);
        return $arr;
    }

    public function CreatePlan(Request $request)
    {
        $input = $request->all();
        $objPlan = new Plan();
        $objPlan->createPlan($input);

        $arr['data'] = $input;
        $arr = Status::mergeStatus($arr, 200);
        return $arr;
    }

    public function UpdatePlan(Request $request, $plan_id)
    {
        $input = $request->all();
        $objPlan = new Plan();
        $objPlan->updatePlan($plan_id, $input);

        $arr['data'] = $input;
        $arr = Status::mergeStatus($arr, 200);
        return $arr;
    }

    public function DeletePlan($plan_id)
    {
        $objPlan = new Plan();
        $objPlan->deletePlan($plan_id);

        return Status::mergeStatus([], 200);
    }
}
