<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class ShowCarExpert extends Controller
{
    public function showExpert()
    {
        $experts = User::all();
        return view('experts', compact('experts'));
    }
}
