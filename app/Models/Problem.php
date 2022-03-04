<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    protected $fillable = array('car_id','problem_desc','image');
    protected $table = 'problems';
    protected $primaryKey = 'p_id';

    protected $timestamp = true;

    public function cars()
    {
        return $this->belongsTo(Car::class);
    }
}
