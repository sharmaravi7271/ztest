<?php

namespace App\Http\Controllers;

use App\Models\Election;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;


class ElectionController extends Controller
{
    
 public function __construct()
    {
       $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        
        $candidates = User::role('candidate')->with('image')->with('votes')->take(4)->get(); 
         return view('election.index',compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function candidate_votes(User $candidate)
    {
         
         $votes = $candidate->votes()->paginate(100);
        return view('election.votes',compact('votes'));
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        return Redirect::back();
        }
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function show(Election $election)
    {
        //
    }
  public function data()
    {
         
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function edit(Election $election)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Election $election)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Election  $election
     * @return \Illuminate\Http\Response
     */
    public function destroy(Election $election)
    {
        //
    }
}
