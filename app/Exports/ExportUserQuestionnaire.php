<?php

namespace App\Exports;

use App\UserQuestionnaire;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportUserQuestionnaire implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = UserQuestionnaire::where('file', null)->orderBy('id', 'DESC')->first();
        $data['user_questionnaire'] = json_decode($data['user_questionnaire']);
        $data = $data['user_questionnaire'];
        return collect($data);
    }
}
