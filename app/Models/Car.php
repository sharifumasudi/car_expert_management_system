<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = array('fuel_type', 'transimission_mode','c_name','brand_name', 'licence');
    protected $table = 'cars';
    protected $primaryKey = 'c_id';

    public function car_brands()
    {
        return $this->belongsTo(CarBrand::class); //belonged to Car Brand
    }

    public function problems()
    {
        return $this->hasMany(Problem::class); //contains many problem
    }

}
