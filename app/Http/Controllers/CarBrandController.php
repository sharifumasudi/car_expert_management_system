<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Models\CarBrand;
class CarBrandController extends Controller
{

    public function __construct()
    {
        $this->middleware(array('auth','role:administrator'));
    }
    public function index()
    {
        $carBrand = CarBrand::orderBy('b_id', 'asc')->get();
        return view('car.brands', compact('carBrand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            $Validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255|unique:car_brands',
                'desc' => 'max:255',
            ]);

            if($Validator->fails())
            {
                return redirect()->back();
            }

            if($Validator->passes())
            {
                CarBrand::create($request->all());
                return redirect()->back()->with(['success' => 'Cool Info Added Success']);
            }
        } catch (\Throwable $th) {

            alert()->error('OOps!','Something Went Wrong:  '.$th->getMessage());
            return redirect()->back();

        }
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
    public function show($id)
    {
        //
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
