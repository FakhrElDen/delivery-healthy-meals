<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuPlan extends Model
{
    protected $fillable = [
        'plan_id',
        'date',
        'menu',
        'file'
    ];

    public function handleMenuTable($date, $planId, $file)
    {
        $this->where('menu', '[]')->delete();
        $objMenu = $this->orderBy('id', 'desc')->first();
        
        $this->where('id', $objMenu['id'])->update([
            'date' => $date, 
            'plan_id' => $planId, 
            'file' => $file
        ]);
    }

    public function getMenuPlanAttachedtoPlanTrans($arrPlanTrans)
    {
        foreach ($arrPlanTrans as $key => $obj) {
            if ($obj['menu'] == '' || $obj['menu'] == null) {
                $datefrom = date('Y-m', strtotime($obj['from']));
                $objMenu = $this->where('plan_id', $obj['plan_id'])->where('date', $datefrom)->first();
                $arrPlanTrans[$key]['menu_submit'] = array();
                $arrMenu = json_decode($objMenu->menu);
                $arrWeek = array();
                $i = 1;

                foreach ($arrMenu as $objMenu) {
                    if ($objMenu->day == "thursady") {
                        $arrWeek['week' . $i][] = $objMenu;
                        $i++;
                    } else {
                        $arrWeek['week' . $i][] = $objMenu;
                    }
                }
                
                $arrPlanTrans[$key]['menu_submit'] = $arrWeek;
            }
        }
        return $arrPlanTrans;
    }
}
