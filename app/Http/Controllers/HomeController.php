<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\ValidateProfileImg;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','role:user']);
    }

    /**
     * Show the application dashboard.
     *
     */
    public function index()
    {
        try
        {

            return view('CarUser.dashboard');

        } catch (\Throwable $th)
        {
            return redirect()->route("login");
        }

    }

    /**
     * Profile Of the User
     *
     * @return void
     */
    public function profile()
    {
      return view('CarUser.profile');
    }

    /**
     *Password Change
     * @return void
     */
    public function passwordChange($value='')
    {
      return view('CarUser.passwordChange');
    }

    /**
     * Contact Car Expert
     *
     * @return void
     */

    public function contact_expert()
    {
        $expert  = User::all();
        return view('CarUser.contact_Expert', compact('expert'));
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

            $Image = $request->user_image
            ->storeAs($destination, $fileName, $folder);
             # Store Finame To public/images
            $userUser = User::find(auth()->user()->id)
            ->update(['user_image' => $fileName]); //Update Image

            if ($userUser) {

                alert()->success('', 'Picha Yako Imebadilishwa Vizuri')
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

    /**
     * Delete Old Image in Storage
     *
     * @return void
     */
    protected function DeleteOldImage()
    {

      if(auth()->user()->user_image){
          Storage::delete("/public/expertProfile/".auth()->user()->user_image);
           //Delete old Image in Storage
      }

    }

    public function updateProfile(Request $request) //$id)
    {
        //dd($request->all());
        try {
            $validateInfo = Validator::make(
              $request->all(),
              [
                'name' => 'required|string|max:255',
                'contact' => 'required|:14|min:10',
                'email' => 'required|max:255',
                'username' => 'required|unique:users|min:6',
                'location' => 'required|string|max:100'
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
              if ($user->hasRole('user')) {
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->username = $request->username;
                    $user->contact = $request->contact;
                    $user->location = $request->location;
                    $user->save();

                if ($user) {
                  alert()->success('Success', 'Your Profile has Been Changed Well!')
                  ->autoClose(3000)->timerProgressBar(true);
                  return redirect()->back();
                }
              }
            }
        }

        catch (\Exception $th)
        {

          return redirect()->back()->with('msg','Something Went, Please
          Contact System Developer For Further Helps!!');

        }

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

          $saveChanges = User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

          if ($saveChanges)
          {

            alert()->success('Success', 'Cool! Your Password Has Been Change, New Password is: '
            .$request->new_password)
            ->autoClose(4000)->timerProgressBar(true);

            return redirect()->back();//Redirect to Back

          }

      }
      }

      catch (\Exception $th)

      {

          alert()->error("OOPs!","Sorry, Something Went Wrong, Please Try Again Later or Make Contact with the System Developer For Further Helps")
          ->timerProgressBar(true)->autoClose(3000);
          return redirect()->back();

      }

    }
}
