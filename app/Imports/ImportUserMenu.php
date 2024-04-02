<?php

namespace App\Imports;

use App\MenuUser;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportUserMenu implements ToCollection
{

    public function collection(Collection $collection){

        $arrMenuPlan = array();
        $i=-1;

        foreach($collection as $key=>$value){

            if($key > 0){

                if($value[0] == null){
                    
                    $arrMenuPlan[$i]['arrMeal']['breakfast'][]=$value[1];
                    $arrMenuPlan[$i]['arrMeal']['lunch'][]=$value[2];
                    $arrMenuPlan[$i]['arrMeal']['snack'][]=$value[3];
                    $arrMenuPlan[$i]['arrMeal']['dinner'][]=$value[4];
                }
                if ($value[0] != null){
                    $i++;
                    $string = str_replace("\n", "", $value[0]);
                    $string = str_replace(" ", "", $string);
                    $string = strtolower($string);
                    $DayDateValue = explode("date:",$string);
                    $arrMenuPlan[$i]['day']=$DayDateValue[0];
                    $arrMenuPlan[$i]['date']=$DayDateValue[1];
                    $arrMenuPlan[$i]['arrMeal']['breakfast'][]=$value[1];
                    $arrMenuPlan[$i]['arrMeal']['lunch'][]=$value[2];
                    $arrMenuPlan[$i]['arrMeal']['snack'][]=$value[3];

                    $arrMenuPlan[$i]['arrMeal']['dinner'][]=$value[4];       
                }
            }           
        }
        MenuUser::create([
            'file'      =>    "file",
            'user_id'   =>    "1",
            'menu'      =>   json_encode($arrMenuPlan)
        ]);
        return true; 

    }
}