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
            'listings'=> Listings::latest()->filter(request(['tag','search']))->paginate(5)
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

        $formFields = $request->validate([
            'title'=>'required',
            'company'=>['required', Rule::unique('listings','company')],
            'location'=>'required',
            'website'=>'required',
            'tags'=>'required',
            'email'=>['required','email'],
            'description'=>'required'
        ]);

            Listings::create($formFields);
        return redirect('/')->with('message','Listing Created Successfully');


    }
}
