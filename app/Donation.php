<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Carbon\carbon;
class Donation extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
        'pickupdate'
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function foodType()
    {
        return $this->belongsTo('App\FoodType');
    }

    public function campaign()
    {
        return $this->belongsTo('App\OurCampaign');
    }
}
