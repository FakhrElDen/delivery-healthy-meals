<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FreezePlan extends Model
{
    protected $fillable = [
        'user_id',
        'from',
        'to'
    ];

    public function checkFreezeplan($user_id)
    {
        $result = FreezePlan::where('user_id', $user_id)->first();
        $dateNow = now();

        if ($result['to'] > $dateNow) {
            return $result;
        }

        return null;
    }
}
