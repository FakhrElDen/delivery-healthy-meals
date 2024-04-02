<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name', 
        'price', 
        'short_desc', 
        'long_desc', 
        'banner_img', 
        'feature_img', 
        'price_per_day',
        'price_per_month', 
        'feature', 
        'long_feature', 
        'menu_sample', 
        'color', 
        'plan_table'
    ];

    public function listPlans()
    {
        $plans = $this->all();
        return $this->processPlanImagesAndFeatures($plans);
    }

    public function getPlanById($id)
    {
        $plan = $this->find($id);
        if ($plan) {
            $plan = $this->processPlanImagesAndFeatures([$plan])[0];
        }
        return $plan;
    }

    public function createPlan($plan)
    {
        return $this->create($plan);
    }

    public function updatePlan($plan_id, $plan)
    {
        return $this->where('id', $plan_id)->update($plan);
    }

    public function deletePlan($plan_id)
    {
        return $this->where('id', $plan_id)->delete();
    }

    private function processPlanImagesAndFeatures($plans)
    {
        foreach ($plans as $plan) {
            $this->processImage($plan, 'banner_img');
            $this->processImage($plan, 'feature_img');
            $this->processImage($plan, 'menu_sample');
            $this->processImage($plan, 'plan_table');

            $plan->feature = $this->processFeatures($plan->feature);
            $plan->long_feature = $this->processLongFeatures($plan->long_feature);
        }
        return $plans;
    }

    private function processImage(&$plan, $imageKey)
    {
        if ($plan->$imageKey) {
            $plan->$imageKey = env('App_Media_URL') . $plan->$imageKey;
        }
    }

    private function processFeatures($features)
    {
        $features = str_replace(" ", "", $features);
        $features = strtolower($features);
        return explode(",", $features);
    }

    private function processLongFeatures($longFeatures)
    {
        $longFeatures = str_replace(["\n", "\r"], "", $longFeatures);
        $longFeatures = rtrim($longFeatures, ".");
        return explode(".", $longFeatures);
    }
}
