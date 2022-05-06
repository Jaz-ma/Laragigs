<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Models\Listings;
use Illuminate\Http\Request;
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


// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing



// All Listings

Route::get('/', [ListingController::class,'index']);

//Show Create Form

Route::get('/listings/create',[ListingController::class,'create']);

// Store Listings

Route::post('/listings',[ListingController::class,'store']);

// Show Edit Form

Route::get('/listings/{listing}/edit',[ListingController::class,'edit']);

//Update Listing

Route::put('/listings/{listing}',[ListingController::class,'update']);

//Delete Listing

Route::delete('/listings/{listing}',[ListingController::class,'destroy']);


// Single Listings

Route::get('/listings/{listing}',[ListingController::class,'show']);

//Show Registar/Create Form

Route::get('/register',[UserController::class,'create']);

// Create New  User

Route::post('/users',[UserController::class,'store']);

//Logout User

ROute::post('/logout',[UserController::class,'logout']);

//Show Login Form

Route::get('/login',[UserController::class,'login']);

//Authenticate User

Route::post('/users/authenticate',[UserController::class,'authenticate']);
