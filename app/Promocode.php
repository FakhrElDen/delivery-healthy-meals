<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promocode extends Model
{
    protected $fillable = [
        'promocode', 'value', 'valid_date'
    ];

    public function checkPromocode($promocode)
    {
        $promocodeExist = $this->where('promocode', $promocode)->first();
        if ($promocodeExist) {
            $validDate = $this->where('promocode', $promocode)->get('valid_date');
            return $validDate;
        } else {
            return false;
        }
    }

    public function promocodeValue($promocode)
    {
        return $this->where('promocode', $promocode)->get('value');
    }

    public function getPromoCodeValuebyId($promo_id)
    {
        return $this->where('id', $promo_id)->get('value');
    }

    public function promocode($promocode)
    {
        return $this->where('promocode', $promocode)->first();
    }

    public function getPromocodebyId($promo_id)
    {
        return $this->where('id', $promo_id)->first();
    }

    public function createPromocode($promocode)
    {
        return $this->create($promocode);
    }

    public function getPromocodes()
    {
        return $this->get()->toArray();
    }

    public function updatePromocode($promocode_id, $promocode)
    {
        return $this->where('id', $promocode_id)->update($promocode);
    }

    public function deletePromocode($promocode_id)
    {
        return $this->where('id', $promocode_id)->delete();
    }

    public function deleteBulkPromocode($promocodes)
    {
        foreach ($promocodes as $promocode_id) {
            $promocode = $this->where('id', $promocode_id)->delete();
        }
        return $promocode;
    }
}
