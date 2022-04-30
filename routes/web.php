<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('/login');
});
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

//Admin -web route

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//admin-routes
Route::middleware(['admin'])->group(function () {

    Route::get('/department/index','DepartmentController@index')->name('department.index');
    Route::get('/department/create','DepartmentController@create')->name('department.create');
    Route::post('/department/store','DepartmentController@store')->name('department.store');
    Route::get('/department/edit/{id}','DepartmentController@edit')->name('department.edit');
    Route::post('/department/update/{id}','DepartmentController@update')->name('department.update');
    Route::get('/department/delete/{id}','DepartmentController@delete')->name('department.delete');

    Route::get('/incharge/index','InChagerController@index')->name('incharge.index');
    Route::get('/incharge/create','InChagerController@create')->name('incharge.create');
    Route::post('/incharge/store','InChagerController@store')->name('incharge.store');
    Route::get('/incharge/edit/{id}','InChagerController@edit')->name('incharge.edit');
    Route::post('/incharge/update/{id}','InChagerController@update')->name('incharge.update');
    Route::get('/incharge/delete/{id}','InChagerController@delete')->name('incharge.delete');

    Route::get('/complaint/index','ComplaintController@index')->name('complaint.index');
    Route::get('/complaint/create','ComplaintController@create')->name('complaint.create');
    Route::post('/complaint/store','ComplaintController@store')->name('complaint.store');
    Route::get('/complaint/edit/{id}','ComplaintController@edit')->name('complaint.edit');
    Route::post('/complaint/update/{id}','ComplaintController@update')->name('complaint.update');
    Route::delete('/complaint/delete/{id}','ComplaintController@delete')->name('complaint.delete');

});

//incharge-routes
Route::group(['middleware' => ['user']],function () {
    Route::get('/complaint/index','ComplaintController@index')->name('complaint.index');
    Route::get('/complaint/create','ComplaintController@create')->name('complaint.create');
    Route::post('/complaint/store','ComplaintController@store')->name('complaint.store');
    Route::get('/complaint/edit/{id}','ComplaintController@edit')->name('complaint.edit');
    Route::post('/complaint/update/{id}','ComplaintController@update')->name('complaint.update');
    Route::get('/complaint/delete/{id}','ComplaintController@delete')->name('complaint.delete');
});

//user-login
Route::get('/user/register','UserController@index')->name('user.register');
Route::get('/user/login','UserController@login')->name('user.login');
Route::post('/user/create','UserController@create')->name('user.create');
    




