<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';
    protected function authenticated(Request $request, $user)
    {
      try{
        if($user->hasRole('administrator'))
        {
          return redirect()->route('admin_dash');
        }

          if($user->hasRole('expert')) //Check For the Expert
          {
            return redirect()->route('expert.dashboard');
          }

          if($user->hasRole('user'))
          {
            return redirect()->route('car_user.dashboard');//checl for the User
          }
      }

      catch(\Exception $e){
        return view('welcome')->with('message','OOps, Something Went Wrong!!, Please try Again Later');
      }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
