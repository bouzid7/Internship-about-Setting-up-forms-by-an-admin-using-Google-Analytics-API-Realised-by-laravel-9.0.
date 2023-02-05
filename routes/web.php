<?php

use App\Http\Controllers\FeaturesForms;
use Illuminate\Support\Facades\Auth;
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
    return view('myhome');
})->name('myhome');


Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){

    Route::get('/manage-forms', function () {
        return view('manageForms');
    })->name('admin.manage-forms');

Route::get('/form/{form_code}',[App\Http\Controllers\FeaturesForms::class,'displayForm'])->name('admin.form');

Route::get('/edit/{id}/{form_code}',[App\Http\Controllers\FeaturesForms::class,'edit_form'])->name('admin.edit');

Route::get('/saveForm',[App\Http\Controllers\FeaturesForms::class,'save_form'])->name('admin.saveForm');

Route::get('/saveResponse',[App\Http\Controllers\FeaturesForms::class,'save_response'])->name('admin.saveResponse');

Route::get('/changeAV',[App\Http\Controllers\FeaturesForms::class,'change_AV'])->name('admin.changeAV');

Route::get('/view_response/{form_code}',[App\Http\Controllers\FeaturesForms::class,'viewresponse']);

Route::get("/viewResponse/{form_code}/{id}",[App\Http\Controllers\FeaturesForms::class,'viewresponseform']);

});


Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/admin', function () {
        return view('indexAdmin');
    })->name('admin');

Route::get('/admin', [ 'as' => 'admin', 'uses' => 'App\Http\Controllers\FeaturesForms@dataAdmin']);

Route::get('deleteForm',[App\Http\Controllers\FeaturesForms::class,'delete_form']);

});


Route::prefix('user')->middleware(['auth'])->group(function(){

Route::get('/accueil', function () {
        return view('pageUser');
    })->name('user.accueil');
    
Route::get('/accueil', [ 'as' => 'user.accueil', 'uses' => 'App\Http\Controllers\FeaturesForms@push']);

Route::get('/form/{form_code}',[App\Http\Controllers\FeaturesForms::class,'displayForm'])->name('user.form');

    
});


Route::group(['middleware' => ['auth']], function() {
   
    Route::get('/logout', [App\Http\Controllers\HomeController::class,'perform'])->name('logout.perform');
 });



 
Route::get('/test1', [App\Http\Controllers\FeaturesForms::class,'test'])->name('test1.test');

Route::get('/teststage', [App\Http\Controllers\FeaturesForms::class,'save_response'])->name('test.stage');


 Route::get('/test', function () {
    return view('test');
});


Auth::routes();






