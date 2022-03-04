<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\ProblemCatgory;

class ProblemCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProblemCatgory::paginate(5);
        //dd($categories);
        return view('car.problem_cate', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),
        [
            'cate_name' => 'required|unique:problem_catgories|min:5|string',
            'description' => 'string'
        ]);
        if($validate->fails()) {
            alert()->error('OOps!', 'Validation Error, Please Ensure
            Minimum Length Of category Name must be at least 5 characters,
            Description must text.')->showConfirmButton("Click Here To Leave");
            return redirect()->back();
        }

        if($validate)
        {
            $data = array(
                'cate_name' => $request->cate_name,
                'description' => $request->description,
            );

            $saveData = ProblemCatgory::insert($data);
            if ($saveData) {
                alert()->success('Nice!','Successfully Problem Category Added');
                return redirect()->back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($id)
        {

            $cate_id = ProblemCatgory::FindOrFail($id);
            return view('car.cat_edit', compact('cate_id'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
