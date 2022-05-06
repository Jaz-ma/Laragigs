<?php

namespace App\Http\Controllers;

use App\Models\Listings;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //show all listings
    public function index(){
        return view('listings.index',[
            'listings'=> Listings::latest()->filter(request(['tag','search']))->get()
        ]);
    }
    //show single listing
    public function show(Listings $listing ){
        return view('listings.show',[
            'listing'=> $listing
        ]);
    }
    //show create form
    public function create(){
        return view('listings.create');
    }

      //store form
      public function store(Request $request){
        dd($request);

        $formFields=$request->validate([
            'title'=>'required',
            'company'=>'required',
            'loaction'=>'required',
            'website'=>'required',
            'tags'=>'required',
            'email'=>['required','email'],
            'description'=>'required'
        ]);
        dd($formFields);


        return redirect('/');
    }
}
