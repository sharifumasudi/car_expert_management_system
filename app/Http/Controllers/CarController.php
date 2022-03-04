<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\CarBrand;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CarController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {

    }

    public function create()
    {
        try {

            $cars  = DB::table('car_users')
            ->leftJoin('cars', 'cars.c_id', '=', 'car_users.car_id')
            ->rightJoin('users', 'users.id', '=', 'car_users.user_id')
            ->select('cars.*','users.*')
            ->get();
            //dd($cars);
            return view('car.create', compact('cars'));

        } catch (\Throwable $th) {
            //throw $th;
            alert()->warning('Oops!',' '.$th->getMessage());
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        //dd($request->all());
       try {

            $validateInput = Validator::make($request->all(),
            [
                'fuel_type' => 'required',
                'transimission_mode' => 'required',
                'brand_name' => 'required',
                'licence' => ['required','unique:cars'],
                'c_name' => ['required'],
            ]);

            if($validateInput->fails())
            {
                alert()->error('Oops!','Validation Input Error')->autoClose(3000)->timerProgressBar(true);
                return redirect()->back();
            }

            if($validateInput)
            {
                $data = array(
                    'c_name'=>$request->c_name,
                    'brand_name' => $request->brand_name,
                    'fuel_type' => $request->fuel_type,
                    'transimission_mode' => $request->transimission_mode,
                    'licence' => $request->licence,
                );

                $getLastId = DB::table('cars')
                ->insertGetId($data);//dd($getLastId);

                $update = DB::table('car_users')
                ->insert(['user_id' =>auth()->user()->id, 'car_id' =>$getLastId]);

                if ($update)
                {
                    alert()->success('Succes!','SuccessiFully Car Information Added!')->autoClose(3000)->timerProgressBar(true);
                    return redirect()->back();
                }

            }


       } catch (\Throwable $th) {
           //throw $th;
           //alert()->error('Oops!',': '.$th->getMessage());
           //return redirect()->back();
           echo  $th->getMessage();
       }

    }

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
