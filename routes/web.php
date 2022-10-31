<?php
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
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

//Common Resource Routes:
//Index - Show all listings
//show - Show single listing
//create -show form to create new listing
//store - store new listing
//update -update listing
//destroy - delete listing


// all listings
Route::get('/',[\App\Http\Controllers\ListingController::class,'index']);


// show create form
Route::get('/listings/create',[\App\Http\Controllers\ListingController::class,'create'])->middleware('auth');

// store listing data
Route::post('/listings', [\App\Http\Controllers\ListingController::class, 'store'])->middleware('auth');

//show edit form
Route::get('/listings/{listing}/edit', [\App\Http\Controllers\ListingController::class, 'edit'])->middleware('auth');

// Update Listing
Route::put('/listings/{listing}', [\App\Http\Controllers\ListingController::class, 'update'])->middleware('auth');


// Delete Listing
Route::delete('/listings/{listing}', [\App\Http\Controllers\ListingController::class, 'destroy'])->middleware('auth');

//Manage listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

//show register/create form
Route::get('/register', [\App\Http\Controllers\UserController::class, 'create'])->middleware('guest');

// create new user
Route::post('/users', [UserController::class, 'store']);

//Log user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// show login form
Route::get('/login', [UserController::class, 'login'])
    ->name('login')
    ->middleware('guest');

// log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);



// single listing
Route::get('/listings/{listing}', [\App\Http\Controllers\ListingController::class, 'show']);



//Route::get('/hello', function (){
//    return response('<h1>works</h1>',200)
//        ->header('Content-Type', 'text/plain')
//        ->header('foo','bar');
//});
//
//Route::get('/post/{id}', function ($id){
//    dd($id);
//    return response('Post'.$id);
//})->where('id','[0-9]+');
//
//Route::get('/search', function (Request $request){
//    return $request->name . ' ' . $request->city;
//});
