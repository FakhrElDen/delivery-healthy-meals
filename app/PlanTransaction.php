<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanTransaction extends Model
{
    protected $fillable = [
        'plan_id', 
        'user_id', 
        'promocode_id', 
        'price', 
        'menu', 
        'from', 
        'to', 
        'payment_status', 
        'ref_code'
    ];

    public function checkUserPlan($user_id)
    {
        return $this->where('user_id', $user_id)->orderBy('id', 'desc')->take(2)->get();
    }

    public function getLastTranstoUser($user_id)
    {
        return $this->where('user_id', $user_id)->latest()->get();
    }

    public function updateStatus($newStatus, $usr_id)
    {
        return $this->where('user_id', $usr_id)->latest()->update(['payment_status' => $newStatus]);
    }

    public function getUserPlanTrans($user_id)
    {
        $dateNowMY = date('Y-m-d');
        $arrAssignedPlan = array();
        $arrPlanTrans = $this->where('user_id', $user_id)->orderBy('id', 'desc')->take(2)->get();
        foreach ($arrPlanTrans as $obj) {
            if ($dateNowMY < $obj['to']) {
                $arrAssignedPlan[] = $obj;
            }
        }
        return $arrAssignedPlan;
    }

    public function storeUserPlan($input, $id)
    {
        return $this->where('user_id', $id)->where('menu', null)->latest()->update(array('menu' => json_encode($input)));
    }

    public function addSubmitMenu($path, $id)
    {
        return $this->where('user_id', $id)->where('file', null)->latest()->update(['file' => $path]);
    }
}
