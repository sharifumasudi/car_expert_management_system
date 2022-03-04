<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ValidateProfileImg;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Storage;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:administrator']);
    }
    public function index()
    {
        return view('admin.dashboard');
    }

    public function profile()
    {
        return view('admin.profile');
    }
    public function create()
    {
        return view('admin.carexpert_create');
    }


    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit()
    {
        return view('admin.change_pas'); //Load password Form
    }

    #Password Change
    protected function updatePswd(Request $request)
    {
        try {
            $validate = Validator::make($request->all(), [
              'current_password' => ['required', new MatchOldPassword],
              'new_password' => ['required'],
              'new_confirm_password' => ['required', 'same:new_password'],
            ]);

          //Checking if Fails
          if ($validate->fails())
          {
              alert()->error('', 'Validation Error Please Try Again')
                ->autoClose(3000)->timerProgressBar(true);
              return redirect()->back();
          }

          //If Validation success
          if ($validate->passes())
          {

              $updateUserPsd = User::find(auth()->user()->id)->update(['password'
              => Hash::make($request->new_password)]);

              if ($updateUserPsd)
              {
                alert()->success('', 'Cool! Nywila Yako Imefanikiwa Kubadilishwa')
                ->autoClose(3000)->timerProgressBar(true);
                return redirect()->back();
              }

          }
          } catch (\Exception $th) {

              alert()->error("OOPs!","Sorry, Something Went Wrong,
               Please Try Again Later or Make Contact with the System Developer For Further Helps")
              ->timerProgressBar(true)->autoClose(3000);
              return redirect()->back();
          }
    }

   #Password End

    #Update Info Func Starts
    public function update(Request $request)
    {
        try {
            $validateInfo = Validator::make(
              $request->all(),
              [
                'name' => 'required|string|max:255',
                'contact' => 'required|unique:users|max:14|min:10',
                'email' => 'required|unique:users|max:255',
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

            if ($validateInfo->passes())
            {
              $user = auth()->user();

              if ($user->hasRole('administrator')) {
                $user->name = $request->name;
                $user->email = $request->email;
                $user->username = $request->username;
                $user->contact = $request->contact;
                $user->location = $request->location;
                $user->experience = $request->experience;
                $user->skills = $request->skills;
                $user->save();

                if ($user) {
                  alert()->success('Ahsante', 'Profile Yako Imebadilishwa Kwa Ufasaha')
                  ->autoClose(3000)->timerProgressBar(true);
                  return redirect()->back();
                }
              }
            }
        }
        catch (\Exception $th)
        {
          return redirect()->back()
          ->with('msg','Something Went, Please Contact System Developer For Further Helps!!');
        }
    }


protected function imgUpdate(ValidateProfileImg $request)
    {
      try {

          $validateImage = $request->validated();

          if ($request->hasFile('user_image'))
          {

            $destination = "administrator";
            $folder = "public"; #Public folder
            $fileName = $request->user_image->getClientOriginalName();

            $this->DeleteOldImage(); //delete old Image
            $Image = $request->user_image
            ->storeAs($destination, $fileName, $folder); //Store Image

            User::find(auth()->user()->id)->update(['user_image' => $fileName]); //Update Image
            alert()->success('', 'Picha Yako Imebadilishwa Vizuri')
            ->autoClose(3000)
            ->timerProgressBar(true);
            return redirect()->back();

          }
      } catch (\Throwable $th)
        {
          alert()->warning('Sorry!','Something Went Wrong, Please Try Again Lator')
          ->autoClose(3000)->timerProgressBar(true);
          return redirect()->back();
        }
    }

    protected function DeleteOldImage()
    {
      if(auth()->user()->user_image)
      {
          Storage::delete("/public/expertProfile/".auth()->user()->user_image);
          //Delete old Image in Storage
      }
    }

    public function destroy($id)
    {
        //
    }

    public function registerExpert()
    {
       return view('admin.registerExpert'); //Load Form
    }

    protected function newEmployeeReg(Request $request) //Create New Car Engineer
     {
       try {
                $data = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'location' => ['required', 'string'],
                'contact' => ['required', 'string', 'max:14', 'unique:users'],
                ]);

                if ($data->fails())
                {
                    alert()->error('OOps!','Validation Failed')
                    ->autoClose(3000)->timerProgressBar(true);
                    return redirect()->back();
                }
                if ($data)
                {
                      $user =  User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'location' =>$request->location,
                        'contact' =>$request->contact,
                        'password' => Hash::make($request->contact)
                        ]);

                        $role = $user->attachRole('expert');
                        if ($role)
                        {

                            return redirect()->back()->with(['user' => 'Expert Name: '.$user->name.
                            " Expert Email:  ".$user->email. ' Contact'.$user->contact]);
                        }
                }
        }

            catch (\Throwable $th) {
            return redirect()->back()->with(['error' =>$th->getMessage()]);
       }
     }
}
