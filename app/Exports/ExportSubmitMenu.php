<?php

namespace App\Exports;

use App\PlanTransaction;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportSubmitMenu implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = PlanTransaction::where('file', null)->orderBy('updated_at', 'DESC')->first();
        $data['menu'] = json_decode($data['menu'], true);
        $data = $data['menu'];
        return collect($data);
    }
}
