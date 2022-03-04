<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProblemCatgory extends Model
{
    protected $fillable = array('cate_name', 'description');

    protected $primaryKey = 'catgory_id';

    public function problems()
    {
        $this->hasMany(Problem::class, 'catgory_id');
    }
}
