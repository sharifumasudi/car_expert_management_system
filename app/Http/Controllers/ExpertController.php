<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ValidateProfileImg;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Solution;
use App\Models\Problem;

class ExpertController extends Controller
{


     public function __construct()
     {
       $this->middleware(['auth', 'role:expert']);
     }


    public function index()
    {
        $soln = Solution::count();
        $problem = Problem::count();
        $user = User::count();
        return view('expert.dashboard', compact('soln', 'problem', 'user'));
    }

    public function profile()
    {
        try {

            return view('expert.profile');
        } catch (\Throwable $th) {
            //throw $th;
            return response($th->getMessage(),200)
            ->header('Content-Type', 'application/json');
        }
    }

    public function passwordChange ()
    {
      return view('expert.passwordChange'); //Return Password change Form
    }

    protected function changePassword(Request $request)
    {
      try {
        $validate = Validator::make($request->all(), [
          'current_password' => ['required', new MatchOldPassword],
          'new_password' => ['required'],
          'new_confirm_password' => ['required', 'same:new_password'],
        ]);

      //Checking if Fails
      if ($validate->fails()) {
          alert()->error('', 'Validation Error Please Try Again')
            ->autoClose(3000)->timerProgressBar(true);
          return redirect()->back();
      }

      //If Validation success
      if ($validate) {

          User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

          alert()->success('', 'Cool! Your Password has been changed')
          ->autoClose(3000)->timerProgressBar(true);
          return redirect()->back();
      }
      } catch (\Exception $th) {

          alert()->error("OOPs!","Sorry, Something Went Wrong, Please Try Again Later or Make Contact with the System Developer For Further Helps")
          ->timerProgressBar(true)->autoClose(3000);
          return redirect()->back();
      }

    }

    protected function imgUpdate(ValidateProfileImg $request)
    {

      try {

          $validateImage = $request->validated();

          if ($request->hasFile('user_image'))
          {

            $destination = "Profile"; //Folder for expert Profile Image

            $folder = "public"; //Folder Where expertProfile is located

            $fileName = $request->user_image->getClientOriginalName(); //Get Name of Image

            $this->DeleteOldImage(); //Delete old Image

            $Image = $request->user_image->storeAs($destination, $fileName, $folder);
             # Store Finame To public/images
            $userUser = User::find(auth()->user()->id)
            ->update(['user_image' => $fileName]); //Update Image

            if ($userUser)
            {

                alert()->success('', 'Your Image Image has been Changed')
                ->autoClose(3000)
                ->timerProgressBar(true);
                return redirect()->back();
            }
          }
      } catch (\Throwable $th)
        {
            if ($th)
            {
                alert()->warning('Sorry!','Something Went Wrong,
                 Please Try Again Lator')->autoClose(3000)
                 ->timerProgressBar(true);
                return redirect()->back(); #Redirect Back If Encounter Errror
            }
        }
    }

    protected function DeleteOldImage()
    {
      if(auth()->user()->user_image)
      {
          Storage::delete("/public/expertProfile/".auth()->user()->user_image); //Delete old Image in Storage
      }

    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $request->session()->regenerate();
        $value = $request->session()->get('key');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request) //$id)
    {
        //dd($request->all());
        try {
            $validateInfo = Validator::make(
              $request->all(),
              [
                'name' => 'required|string|max:255',
                'contact' => 'required|max:14|min:10',
                'email' => 'required|max:255',
                'username' => 'required|unique:users|min:6',
                'location' => 'required|string|max:100',
                'skills' => 'required|string|max:255',
                'experience' => 'required|string|max:255',
              ]
            );

            if ($validateInfo->fails()) {
              alert()->error('Ooops!!', 'Validation Problem Please Try Again')
              ->autoClose(3000)->timerProgressBar(true);
              return redirect()->back();
            }

            if ($validateInfo->passes()) {
              //$user = auth()->user();
              $user = auth()->user();
              if ($user->hasRole('expert')) {
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->username = $request->username;
                    $user->contact = $request->contact;
                    $user->location = $request->location;
                    $user->experience = $request->experience;
                    $user->skills = $request->skills;
                    $user->save();

                if ($user) {
                  alert()->success('Ahsante', 'Your Profile has been Changed')
                  ->autoClose(3000)->timerProgressBar(true);
                  return redirect()->back();
                }
              }
            }
        } catch (\Exception $th) {
          return redirect()->back()->with('msg','Something Went, Please Contact System Developer For Further Helps!!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
