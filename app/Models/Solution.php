<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{

    protected $fillable = array('expert_id', 'problem_id','soln');
    protected $table = 'solutions';
    protected $primaryKey = 's_id';

    public function problems()
    {
        return $this->belongsTo(Problem::class);
    }

    public function user(){
        $this->belongsTo(User::class);
    }
}
