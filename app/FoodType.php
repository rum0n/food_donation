<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodType extends Model
{
    protected $fillable = ['name'];

    public function donations()
    {
        return $this->hasMany('App\Donation');
    }
}
