<?php

use App\Models\ProblemCatgory;
use App\Models\Solution;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$router->get('/hi',function(){
    return "Hello World!";
}); //Avoid using facades

Route::get('/', function () {
    $solutions = Solution::all();
    return view('welcome', compact('solutions'));
});

Auth::routes();
Route::prefix('/admin')->group(function(){
  #Profile
  Route::get('/dashboard','Admin\AdminController@index')->name('admin_dash');

  Route::get('/profile', 'Admin\AdminController@profile')->name('adminProfile');

  Route::post('/updateProfile','Admin\AdminController@update')->name('adminUpdate');

  Route::get('/changePassword','Admin\AdminController@edit')->name('adminchangePSWD');

  Route::post('/updatePSW','Admin\AdminController@update')->name('updatepswd');

  Route::post('/AdminImgUpdate', 'Admin\AdminController@imgUpdate')->name('AdminImgUpdate');

  Route::get('/registerExpert', 'Admin\AdminController@registerExpert')->name('registerExpert');

  Route::post('/newEmployee', 'Admin\AdminController@newEmployeeReg')->name('newEmployee');

  //Activities DONE BY
  Route::resource('view_carsolutions', SolutionController::class);
  Route::get('/manage','CarBrandController@index')->name('brand_manage');

  Route::post('/newbrand','CarBrandController@create')->name('newbrand');

  Route::get('/carexpert', 'Admin\AdminController@create')->name('carexpert');

  Route::post('/postNewExpert','Admin\AdminController@store')->name('postNewExpert');
  Route::resource('/problem_category', ProblemCategoryController::class);
});

//Expert Routes
Route::prefix('/expert')->group(function()
{
  //About Expert Prolfile
  Route::get('/dashboard','ExpertController@index')->name('expert.dashboard');

  Route::get('/profile', 'ExpertController@profile')->name('showProfile');

  Route::post('/updateExpertInf', 'ExpertController@updateProfile')->name('update');

  Route::post('/imgUpdate','ExpertController@imgUpdate')->name('imgUpdate');

  Route::get('/passwordChange','ExpertController@passwordChange')->name('ChangePSWD');

  Route::post('/updatePSWD',     'ExpertController@changePassword')->name('saveChanges');

  //Activities Peroformed By Expert
  Route::resource('manage_car',     'CarController');

  Route::resource('carsolutions', SolutionController::class);

  Route::resource('problems_route', ProblemsController::class);

  Route::get('/Problem_asked',  'ProblemsController@index')->name('messages');

});


//Car User Routes
Route::prefix('/car_user')->group(function(){

/**
 * User Profile
 */
  Route::get('/dashboard', 'HomeController@index')->name('car_user.dashboard');

  Route::get('/profile', 'HomeController@profile')->name('profile');

  Route::get('/passwordChange', 'HomeController@passwordChange')->name('passwordChange');

  Route::post('/carUser_changePassword',     'HomeController@changePassword')->name('carUser_changePassword');

  Route::resource('car_soln', SolutionController::class); #car user use To view Solns

  Route::post('/car_userImgUpdate', 'HomeController@imgUpdate') ->name('car_userImgUpdate');

  Route::post('/car_user_UpdateProfile','HomeController@updateProfile')->name('car_user_UpdateProfile');

  /**
   * END User Profile
   */

   /**ACTIVITIES DONE BY THE USER */

   Route::resource('car_manage',     'CarController');

   Route::resource('problems', ProblemsController::class);

   Route::get('/contact_expert', 'HomeController@contact_expert')->name('contact_expert');

   Route::get('/send_message', "HomeController@send_message@sendMessage");


});

Route::prefix('/')->group(function(){

    Route::post('/fetch_results', "Results\ResultController@index")->name("fetch_results");
    //Fetch car Soln
    Route::get('/expert','ShowCarExpert@showExpert')->name('experts');//Show Experts To Home

    Route::post('/contact','ContactController@store')->name('contact');//Create Contact
});
