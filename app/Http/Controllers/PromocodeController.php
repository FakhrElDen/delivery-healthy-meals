<?php

namespace App\Http\Controllers;

use App\Status;
use App\Promocode;
use Illuminate\Http\Request;

class PromocodeController extends Controller
{
    public function CheckPromocode($promocode)
    {
        $arr = array();
        $objPromocode = new Promocode();
        $result = $objPromocode->checkPromocode($promocode);

        if ($result == false) {
            $arr['data'] = $result;
            $arr = Status::mergeStatus($arr, 5010);
            return $arr;
        }

        $now = now();

        foreach ($result as $key => $value) {
            $dateValue = $value['valid_date'];
        }

        if ($dateValue < $now) {
            $arr['data'] = $result;
            $arr = Status::mergeStatus($arr, 5010);
            return $arr;
        }

        $value = $objPromocode->promocodeValue($promocode);

        $arr['promocode'] = $objPromocode->promocode($promocode);
        $arr['data'] = $value;
        $arr = Status::mergeStatus($arr, 200);
        return $arr;
    }

    public function CreatePromocode(Request $request)
    {
        $arr = array();
        $input = $request->all();

        $objPromocode = new Promocode();
        $objPromocode->createPromocode($input);

        $arr['data'] = $input;
        $arr = Status::mergeStatus($arr, 200);
        return $arr;
    }

    public function ReadPromocode()
    {
        $objPromocode = new Promocode();
        $promocode = $objPromocode->getPromocodes();

        $arr['data'] = $promocode;
        $arr = Status::mergeStatus($arr, 200);
        return $arr;
    }

    public function ViewPromocode($promocode_id)
    {
        $objPromocode = new Promocode();
        $promocode = $objPromocode->getPromocodebyId($promocode_id);

        $arr['data'] = $promocode;
        $arr = Status::mergeStatus($arr, 200);
        return $arr;
    }

    public function UpdatePromocode(Request $request, $promocode_id)
    {
        $input = $request->all();

        $objPromocode = new Promocode();
        $objPromocode->updatePromocode($promocode_id, $input);

        $arr['data'] = $input;
        $arr = Status::mergeStatus($arr, 200);
        return $arr;
    }

    public function DeletePromocode($promocode_id)
    {
        $objPromocode = new Promocode();
        $objPromocode->deletePromocode($promocode_id);

        return Status::mergeStatus([], 200);
    }

    public function DeleteBulkPromoCode(Request $request)
    {
        $input = $request->all();

        $objPromocode = new Promocode();
        $objPromocode->deleteBulkPromocode($input);

        return Status::mergeStatus([], 200);
    }
}
