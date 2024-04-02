<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddressUser extends Model
{
    protected $fillable = [
        'user_id',
        'address_name',
        'address'
    ];

    public function getAddressAttachedtoUser($user_id)
    {
        return $this->where('user_id', $user_id)->get();
    }

    public function editUserAddress($arrUserAddress, $user_id)
    {
        $this->where('user_id', $user_id)->delete();

        foreach ($arrUserAddress as $obj) {
            $result = AddressUser::create([
                'user_id'      =>    $user_id,
                'address_name'   =>    $obj['address_name'],
                'address'      =>   $obj['address']
            ]);
        }

        return $result;
    }
}
