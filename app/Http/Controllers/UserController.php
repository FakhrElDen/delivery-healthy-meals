<?php

namespace App\Http\Controllers;

use App\User;
use App\Status;
use App\MenuUser;
use App\Promocode;
use App\FreezePlan;
use App\AddressUser;
use App\Mail\ContactUs;
use App\PlanTransaction;
use App\Mail\ConfirmEmail;
use App\UserQuestionnaire;
use App\Mail\MealsSelected;
use App\Mail\ForgotPassword;
use App\Mail\UserFreezePlan;
use Illuminate\Http\Request;
use App\Exports\ExportSubmitMenu;
use App\Mail\ReportAdminPlanFreeze;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Mail\ReportAdminUserRegister;
use App\Exports\ExportUserQuestionnaire;

class UserController extends Controller
{
    public function Register(Request $request)
    {

        $arr = array();
        $input = $request->all();

        //to make all inputs required
        if (
            $input['email'] == null || $input['password'] == null ||
            $input['name'] == null || $input['age'] == null ||
            $input['phone'] == null || $input['address'] == null
        ) {
            $arr['data'] = $input;
            $arr = Status::mergeStatus($arr, 5018);
            return $arr;
        }

        //check user exist
        $objUser = new User();
        $user = $objUser->getUser($input['email']);

        if ($user != null) {
            $arr['data'] = $input;
            $arr = Status::mergeStatus($arr, 4016);
            return $arr;
        }

        //hash password & make hashed password input
        $pass = $input['password'];
        $password = Hash::make($pass);
        $input['password'] = $password;
        $input['avatar'] = "users/August2020/TYEqVnqPPWXGYMPWAXBD.png";

        //store user data
        $result = User::create($input);

        //store user address
        AddressUser::create([
            'user_id'       => $result['id'],
            'address_name'  => "Home",
            'address'       => $input['address'],
        ]);

        //send mail to active user & report admin
        $data = array(
            'name'    => $input['name'],
            'email'   => $input['email'],
            'phone'   => $input['phone'],
            'address' => $input['address']
        );

        Mail::to($data['email'])->send(new ConfirmEmail($data));
        Mail::to("banin.chahine@utritionlife.com")->send(new ReportAdminUserRegister($data));
        Mail::to("info@utritionlife.com")->send(new ReportAdminUserRegister($data));

        if ($result) {
            $arr['data'] = $input;
            $arr['user_id'] = $result['id'];
            $arr = Status::mergeStatus($arr, 200);
            return $arr;
        }
    }

    public function ResendMail($user_id)
    {
        $objUser = new User();
        $user = $objUser->getUserById($user_id);

        $data = array(
            'name'    => $user['name'],
            'email'   => $user['email'],
        );

        Mail::to($data['email'])->send(new ConfirmEmail($data));

        $arr['data'] = $data;
        $arr = Status::mergeStatus($arr, 200);
        return $arr;
    }

    public function Login(Request $request)
    {

        $arr = array();
        $email = $request->email;
        $password = $request->password;

        //get user info by email
        $objUser = new User();
        $user = $objUser->getUser($email);

        //check if user exist
        if ($user != null) {

            //check password
            if (Hash::check($password, $user['password'])) {
                $arr['data'] = $user;
                $arr = Status::mergeStatus($arr, 200);
                return $arr;
            }

            $arr['data']['email'] = $email;
            $arr['data']['password'] = $password;
            $arr = Status::mergeStatus($arr, 5013);
            return $arr;
        } else {
            $arr['data'] = $user;
            $arr = Status::mergeStatus($arr, 4030);
            return $arr;
        }
    }

    public function ActiveUser($email)
    {
        $objUser = new User();
        $objUser->activeUser($email);

        return redirect('https://utritionlife.com/#/success-verify-email-reg');
    }

    public function ForgotPassword($id)
    {
        return redirect('https://utritionlife.com/#/forget-pass-newpass?id=' . $id);
    }

    public function ResendMailforResetPassword($email)
    {
        $objUser = new User();
        $user = $objUser->getUser($email);

        $data = array(
            'id'      => $user['id'],
            'name'    => $user['name'],
            'email'   => $user['email'],
        );

        Mail::to($data['email'])->send(new ForgotPassword($data));

        $arr['data'] =  $user['email'];
        return Status::mergeStatus($arr, 200);
    }

    public function CheckEmail($email)
    {
        $arr = array();

        $objUser = new User();
        $user = $objUser->getUser($email);

        if ($user) {

            $data = [
                'id'      => $user['id'],
                'name'    => $user['name'],
                'email'   => $user['email'],
            ];

            Mail::to($data['email'])->send(new ForgotPassword($data));

            $arr['data'] =  $user['email'];
            return Status::mergeStatus($arr, 200);
        }

        return Status::mergeStatus($arr, 5017);
    }

    public function ResetPassword(Request $request, $email)
    {
        $arr = array();
        $objUser = new User();
        $input = $request->all();
        $user = $objUser->getUser($email);
        if ($input['password'] == null || $input['confirm_password'] == null) {
            $arr['password'] = $input['password'];
            $arr['password_c'] = $input['confirm_password'];
            $arr = Status::mergeStatus($arr, 5018);
            return $arr;
        }
        if ($input['password'] != $input['confirm_password']) {
            $arr['password'] = $input['password'];
            $arr['confirm_password'] = $input['confirm_password'];
            $arr = Status::mergeStatus($arr, 5013);
            return $arr;
        }
        $password = Hash::make($input['password']);
        $result = $objUser->updatePassword($user['id'], $password);
        $arr['data'] = $input['password'];
        $arr = Status::mergeStatus($arr, 200);
        return $arr;
    }

    public function UpdateFirstTime($id)
    {
        $arr = array();
        $objUser = new User();
        $result = $objUser->updateFirstTime($id);
        $arr['data'] = $result;
        $arr = Status::mergeStatus($arr, 200);
        return $arr;
    }

    public function GetUserData($user_id)
    {
        $arr = array();
        $objUser = new User();
        $User = $objUser->getUserById($user_id);
        $objAddress = new AddressUser();
        $arrUserAddress = $objAddress->getAddressAttachedtoUser($user_id);
        $objUserQuestionnaire = new UserQuestionnaire();
        $resultQuestionnaire = $objUserQuestionnaire->getUserQuestionnaire($user_id);
        $objFreezePlan = new FreezePlan;
        $resultFreezePlan = $objFreezePlan->checkFreezeplan($user_id);
        $objPlanTrans = new PlanTransaction();
        $arrPlanTrans = $objPlanTrans->getUserPlanTrans($user_id);
        $objMenuUser = new MenuUser();
        $arrMenuandSubmitPlan = $objMenuUser->getMenuPlanAttachedtoPlanTrans($arrPlanTrans);
        $arr['user'] = $User;
        $arr['freeze_plan'] = $resultFreezePlan;
        $arr['user_address'] = $arrUserAddress;
        $arr['plan_ass'] = $arrMenuandSubmitPlan;
        $arr['user_q'] = $resultQuestionnaire;
        $arr = Status::mergeStatus($arr, 200);
        return $arr;
    }

    public function EditUserData(Request $request, $id)
    {
        $arr = array();
        $input = $request->all();
        $arrUser = array(
            'name'      => $input['name'],
            'age'       => $input['age'],
            'phone'     => $input['phone']
        );

        if (isset($input['password'])) {
            $pass = $input['password'];
            $password = Hash::make($pass);
            $input['password'] = $password;
            $arrUser['password'] = $input['password'];
        }

        $objUser = new User();
        $objUser->editUserData($arrUser, $id);
        $objAddress = new AddressUser();
        $UserAddress = $objAddress->editUserAddress($input['arrAddress'], $id);

        $arr['data'][] = $arrUser;
        $arr['data'][] = $UserAddress;
        $arr = Status::mergeStatus($arr, 200);
        return $arr;
    }

    public function StoreUserPlan(Request $request, $id)
    {
        $arr = array();
        $input = $request->all();
        $objPlan = new PlanTransaction();
        $result = $objPlan->storeUserPlan($input, $id);

        $objUser = new User();
        $user = $objUser->getUserById($id);
        $userEmail = $user['email'];
        $data = array(
            'name'    => $user['name'],
            'email'   => $user['email'],
        );
        Mail::to($data['email'])->send(new MealsSelected($data));

        Excel::store(new ExportSubmitMenu, 'public/' . $id . $userEmail . '.xlsx');
        $path = "$id$userEmail.xlsx";
        $objPlan->addSubmitMenu($path, $id);

        $arr['data'] = $result;
        $arr = Status::mergeStatus($arr, 200);
        return $arr;
    }

    public function UserQuestionnaire(Request $request, $id)
    {
        $arr = array();
        $arrInput = $request->all();
        $i = 0;
        foreach ($arrInput as $key => $value) {
            $arrExcel[$i] = array(
                'q' => $key,
                'a' => $value,
            );
            $i++;
        }

        $userQuestionnaire = json_encode($arrExcel);
        $input = array(
            'user_id'            => $id,
            'user_questionnaire' => $userQuestionnaire,
        );
        UserQuestionnaire::create($input);
        $objUser = new User();
        $user = $objUser->getUserById($id);
        $userName = $user['name'];
        Excel::store(new ExportUserQuestionnaire, 'public/' . $id . $userName . '.xlsx');
        $path = "$id$userName.xlsx";

        $objUserQuestionnaire = new UserQuestionnaire();
        $objUserQuestionnaire->addFile($path);
        $objUser->updateFirstTime($id);

        $arr['data'] = $input;
        return Status::mergeStatus($arr, 200);
    }

    public function ContactUs(Request $request)
    {
        $arr = array();
        $input = $request->all();

        $data = array(
            'name'          => $input['first_name'],
            'last_name'     => $input['last_name'],
            'email'         => $input['email'],
            'phone'         => $input['phone'],
            'message'       => $input['message'],
        );
        Mail::to("banin.chahine@utritionlife.com", "info@utritionlife.com")->send(new ContactUs($data));

        $arr['data'] = $data;
        $arr = Status::mergeStatus($arr, 200);
        return $arr;
    }

    public function FreezePlan(Request $request)
    {
        $arr = array();
        $input = $request->all();
        $today = now();
        $from = date('Y-m-d', strtotime($today . " +2 days"));
        $to = date('Y-m-d', strtotime($input['from'] . " +45 days"));

        if ($input['from'] < $from) {
            $arr['data'] = $input['from'];
            $arr = Status::mergeStatus($arr, 5019);
            return $arr;
        }

        if ($input['to'] > $to) {
            $arr['data'] = $input['to'];
            $arr = Status::mergeStatus($arr, 5019);
            return $arr;
        }

        FreezePlan::create($input);

        $objUser = new User();
        $user = $objUser->getUserById($input['user_id']);

        $data = array(
            'name'  => $user['name'],
            'email' => $user['email'],
            'from'  => $input['from'],
            'to'    => $input['to'],
        );

        Mail::to($data['email'])->send(new UserFreezePlan($data));
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ReportAdminPlanFreeze($data));

        $arr['data'] = $input;
        return Status::mergeStatus($arr, 200);
    }

    public function ShowUserProfile()
    {
        $objUser = new User();
        $users = $objUser->getNormalUsers();

        return Status::mergeStatus(['data' => $users], 200);
    }

    public function ViewProfile($user_id)
    {
        return redirect('https://utritionlife.com/#/user-data/' . $user_id);
    }

    public function ViewUserProfile()
    {
        $objUser = new User();
        $users = $objUser->getNormalUsers();
        return view('users_profiles', compact('users'));
    }

    public function UserProfile($user_id)
    {
        $arr = array();

        $objUser = new User();
        $User = $objUser->getUserById($user_id);

        $objAddress = new AddressUser();
        $arrUserAddress = $objAddress->getAddressAttachedtoUser($user_id);

        $objUserQuestionnaire = new UserQuestionnaire();
        $resultQuestionnaire = $objUserQuestionnaire->getUserQuestionnaire($user_id);

        $objFreezePlan = new FreezePlan;
        $resultFreezePlan = $objFreezePlan->checkFreezeplan($user_id);

        $objPlanTrans = new PlanTransaction();
        $arrPlanTrans = $objPlanTrans->getUserPlanTrans($user_id);

        $objMenuUser = new MenuUser();
        $arrMenuandSubmitPlan = $objMenuUser->getMenuPlanAttachedtoPlanTrans($arrPlanTrans);

        if ($arrMenuandSubmitPlan != []) {
            $objPromocode = new Promocode();
            $arrPromocode = $objPromocode->getPromocodebyId($arrMenuandSubmitPlan[0]["promocode_id"]);
            $arr['arr_menu'] = json_decode($arrMenuandSubmitPlan[0]['menu']);
            if ($arr['arr_menu'] != null) {
                $arr['arr_menu'] = $arr['arr_menu']->data;
            }
        } else {
            $arrPromocode = null;
            $arr['arr_menu'] = null;
        }

        $arr['user'] = $User;
        $arr['user_address'] = $arrUserAddress;
        $arr['user_q'] = $resultQuestionnaire;
        $arr['plan_ass'] = $arrMenuandSubmitPlan;
        $arr['promocode'] = $arrPromocode;
        $arr['freeze_plan'] = $resultFreezePlan;

        return view('profile', compact('arr'));
    }

    public function CreateUser(Request $request)
    {
        $arr = array();
        $input = $request->all();

        $objUser = new User();
        $user = $objUser->getUser($input['email']);

        if ($user != null) {
            return Status::mergeStatus(['data' => $input], 4016);
        } else {
            $password = Hash::make($input['password']);
            $input['password'] = $password;

            $user = $objUser->createUser($input);
            $arr['data'] = $input;

            return Status::mergeStatus($arr, 200);
        }
    }

    public function ReadUser()
    {
        $objUser = new User();
        $users = $objUser->getUsers();

        return Status::mergeStatus(['data' => $users], 200);
    }

    public function ViewUser($user_id)
    {
        $objUser = new User();
        $user = $objUser->getUserById($user_id);

        return Status::mergeStatus(['data' => $user], 200);
    }

    public function UpdateUser(Request $request, $user_id)
    {
        $input = $request->all();
        $objUser = new User();
        $user = $objUser->getUser($input['email']);

        if ($user == null) {
            $arr['data'] = $input;
            $arr = Status::mergeStatus($arr, 4030);
            return $arr;
        } else {
            $password = Hash::make($input['password']);
            $input['password'] = $password;
            $user = $objUser->editUserData($user_id, $input);
            $arr['data'] = $input;
            $arr = Status::mergeStatus($arr, 200);
            return $arr;
        }
    }

    public function DeleteUser($user_id)
    {
        $objUser = new User();
        $objUser->deleteUser($user_id);
        return Status::mergeStatus([], 200);
    }
}
