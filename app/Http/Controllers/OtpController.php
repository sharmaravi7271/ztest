<?php

namespace App\Http\Controllers;

use App\Models\otp;
use Illuminate\Http\Request;

class OtpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
        $otp = $this->createotp();
            otp::create([
                'otp'=>$otp,
                'email'=>$request->input('email')
            ]);
            echo  $otp;
            die();
    }



    public function createotp(){

    $str = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
     $num_str =  substr(str_shuffle($str),0, 8);
       $checkotp  = otp::where('otp',$num_str)->first();
       if($checkotp==null){
        return $num_str;
       }else{
        return createotp();
       }

    }

    public function veriry(Request $request){

       $otpstatus =  otp::where('otp',$request->input('otp'))->where('email',$request->input('email'))->first();
       if( $otpstatus !=null){
        echo 'success';
       }else{
        echo 'failed';

       }
       die();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\otp  $otp
     * @return \Illuminate\Http\Response
     */
    public function show(otp $otp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\otp  $otp
     * @return \Illuminate\Http\Response
     */
    public function edit(otp $otp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\otp  $otp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, otp $otp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\otp  $otp
     * @return \Illuminate\Http\Response
     */
    public function destroy(otp $otp)
    {
        //
    }
}
