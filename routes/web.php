<?php

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
    return view('welcome');
})->name('welcome');

Auth::routes();
Route::group(['middleware' => 'auth'], function() {
  Route::group(['middleware' => 'role:Admin'], function() {
    Route::resource('admin','AdminController')->only(['index','update']);
    Route::resource('group','GroupController')->except('show');
    Route::resource('user','UserController')->except('show');
    Route::resource('role','RoleController');
  });
  Route::resource('file','FileController')->only(['destroy']);
  Route::get('search', 'SearchController@search')->name('search');
  Route::get('/home', 'HomeController@index')->name('home');
  Route::resource('report','ReportController');
  Route::get('list/reports','ReportController@list_reports');
  Route::prefix('report')->group(function(){
    Route::name('reportByGroup')->get('/group/{group}','ReportController@getReportByGroup');
    Route::name('reportByTag')->get('/Tag/{name}','ReportController@getReportByTag');
  });
});

Route::get('lang/{lang}', 'langController');
