<?php

namespace App\Http\Controllers;

use App\Models\Listings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //Show All Listings
    public function index(){
        return view('listings.index',[
            'listings'=> Listings::latest()->filter(request(['tag','search']))->paginate(5)
        ]);
    }
    //Show Single Listing
    public function show(Listings $listing ){
        return view('listings.show',[
            'listing'=> $listing
        ]);
    }
    //Show Create Form
    public function create(){
        return view('listings.create');
    }

      //Store Form
      public function store(Request $request){
        $formFields = $request->validate([
            'title'=>'required',
            'company'=>['required', Rule::unique('listings','company')],
            'location'=>'required',
            'website'=>'required',
            'tags'=>'required',
            'email'=>['required','email'],
            'description'=>'required',
            'logo'=>'required'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo']= $request->file('logo')->store('logos','public');


        }

        $formFields['users_id']= \auth()->id();

        Listings::create($formFields);
        return redirect('/')->with('message','Listing Created Successfully');


    }

    //Show Edit Form

    public function edit(Listings $listing){

        return view('listings.edit',['listing'=>$listing]);
    }

    // Update Form

    public function update(Request $request, Listings $listing){
        $formFields = $request->validate([
            'title'=>'required',
            'company'=>['required'],
            'location'=>'required',
            'website'=>'required',
            'tags'=>'required',
            'email'=>['required','email'],
            'description'=>'required',

        ]);

        if($request->hasFile('logo')){
            $formFields['logo']= $request->file('logo')->store('logos','public');


        }

        $listing->update($formFields);
        return back()->with('message','Listing Updated Successfully');


    }

    // Delete Form

    public function destroy(Listings $listing){
        $listing->delete();

        return redirect('/')->with('message','Listing Deleted Successfully');
    }

    // Show Manage Listing page

    public function manage(){
       return view('listings.manage',['listings'=> auth()->user()->listing()->get()]);
    }



}
