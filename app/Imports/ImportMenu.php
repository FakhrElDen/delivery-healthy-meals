<?php

namespace App\Imports;

use App\MenuPlan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Status;

class ImportMenu implements ToCollection
{

    public function collection(Collection $collection){

        $arrMenuPlan = array();
        $arrWeek = array();
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
                    $DayDateValue = explode("Date: ",$value[0]);
                    $arrMenuPlan[$i]['day']=$DayDateValue[0];
                    $arrMenuPlan[$i]['date']=$DayDateValue[1];
                    $arrMenuPlan[$i]['arrMeal']['breakfast'][]=$value[1];
                    $arrMenuPlan[$i]['arrMeal']['lunch'][]=$value[2];
                    $arrMenuPlan[$i]['arrMeal']['snack'][]=$value[3];

                    $arrMenuPlan[$i]['arrMeal']['dinner'][]=$value[4];       
                }
            }           
        }
        MenuPlan::create([
            'file'      =>    "file",
            'plan_id'   =>    "1",
            'date'      =>    "1",
            'menu'      =>   json_encode($arrMenuPlan)
        ]);
        return true; 

    }
}