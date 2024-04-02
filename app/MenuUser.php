<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuUser extends Model
{
    protected $fillable = [
        'user_id', 'menu', 'file'
    ];

    public function handleMenuUserTable($userId, $file)
    {
        $this->where('menu', '[]')->delete();
        $latestMenuUser = $this->orderBy('id', 'desc')->first();
        if ($latestMenuUser) {
            $latestMenuUser->update(['user_id' => $userId, 'file' => $file]);
        }
    }

    public function getMenuPlanAttachedtoPlanTrans($arrPlanTrans)
    {
        foreach ($arrPlanTrans as $key => $obj) {
            if ($obj['menu'] != null) {
                $arrPlanTrans[$key]['menuUser'] = $this->organizeMenuByWeek($obj['menu']);
            }

            if (empty($obj['menu'])) {
                $objMenu = $this->where('user_id', $obj['user_id'])->orderBy('id', 'DESC')->first();
                if ($objMenu) {
                    $arrPlanTrans[$key]['menu_submit'] = $this->organizeMenuByWeek($objMenu->menu);
                }
            }
        }
        return $arrPlanTrans;
    }

    private function organizeMenuByWeek($menuJson)
    {
        $menu = json_decode($menuJson);
        $weeklyMenu = [];
        $week = 1;

        foreach ($menu as $menuItem) {
            $day = strtolower($menuItem->day);
            if ($day == 'thursday') {
                $week++;
            } elseif ($day == 'friday') {
                $week--;
            }
            $weeklyMenu['week' . $week][] = $menuItem;
        }

        return $weeklyMenu;
    }
}
