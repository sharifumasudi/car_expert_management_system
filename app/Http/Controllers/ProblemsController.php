<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\problemsRequest;
use Alert;
use App\Models\Problem;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Models\ProblemCatgory;
use Illuminate\Support\Facades\Auth;

class ProblemsController extends Controller
{
    public function index()
    {
        try {

             //$problem = Problem::latest()->get();
            $problem = Problem::select('problems')
            ->Join('problem_catgories', 'problem_catgories.catgory_id', '=', 'problems.problem_catgory_id')
            ->join('users', 'users.id','=', 'problems.user_id')
            ->select('problems.*','problem_catgories.*', 'users.*')->get();
            //return dd($problem);

            if($problem)
            {
                return view('car.asked', compact('problem'));
            }

        } catch (\Throwable $th) {
            //throw $th;
            if($th)
            {
                alert()->error('Oops','Something Went Wrong'.$th->getMessage()); //$th->getMessage()
                return redirect()->back();
            }

        }

    }

    public function create()
    {

        $category = ProblemCatgory::all();
       return view('car.problems', compact('category'));
    }

    public function store(Request $request)
    {
        try {
            //dd($request->all());
            $validator = Validator::make(
                $request->all(),
                [
                    "problem_catgory_id" => "required",
                    'problem_desc' => ['required','string', 'unique:problems'],
                    "image" => "mimes:jpg,jpeg,png,tiff",
                ]
            );
            //End Data Validation

            if ($validator->fails())//Check Validation
            {
                alert()->error('Oops!',"An Error Occured, Please Make Sure Fill All Data
                            Correctly And Ensure Problem is Unique")
                            ->autoClose(3000)->timerProgressBar(true);
                return redirect()->back();
            }

            if($validator->validated())
            {

                if(isset($_POST['button']))
                {
                    $problems = new Problem; //Problem Object instatiate
                    $user = auth()->user()->id;
                    if($request->hasFile('image'))
                    {
                        //Save Problem If Image Is Included
                        $s_image = $request->image->getClientOriginalName();
                        $request->image->storeAs('problems',$s_image, 'public');
                        $problems->problem_catgory_id = $request->problem_catgory_id;
                        $problems->problem_desc = $request->problem_desc;
                        $problems->image = $s_image;
                        $problems->user_id = $user;
                        $problems->save();

                        if($problems)
                        {
                            alert()->success('Success!', 'Successifully Car Problem Sent!,
                            You Will Notified Either By Your Contanct')
                            ->autoClose(3000)->timerProgressBar(true);

                            return redirect()->back();
                        }


                    }

                    else {
                        //No Image Taken
                        $problems->problem_catgory_id = $request->problem_catgory_id;
                        $problems->user_id = $user;
                        $problems->problem_desc = $request->problem_desc;
                        $problems->save();

                        if($problems)
                        {
                            alert()->success('')->autoClose(3000)->timerProgressBar(true);
                            return redirect()->back();
                        }


                    }
                }

            }

        } catch (\Throwable $th) {

                return;

        }

    }

    public function show($id)
    {
        $carId = Car::find($id);
        return $this->create()->with('carId', $carId);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Request $request, $id)
    {
        dd($request->id);
    }
}
