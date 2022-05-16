<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Election;
use Illuminate\Support\Facades\Redirect;




class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $candidates = User::role('candidate')->with('image')->take(4)->get();
         return view('welcome',compact('candidates'));
    }

      public function store(Request $request)
    {
        $candidates = $request->input('candidate');


        foreach($candidates as $key=>$candidate){
        Election::create([
                    'user_id'=>$key,
                    'full_name'=>$request->input('full_name'),
                    'email' =>$request->input('email'),
                    'phone_number' =>$request->input('phone_number'),
                    'member_id' =>$request->input('member_id'),
                    'status' =>$candidate,
                    'is_verified' =>'Yes',
              ]);
        
        }
        return Redirect::back();
      
    }
}
