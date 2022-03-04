<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarBrand extends Model
{
    protected $fillable = array('b_name','desc');

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
