<?php

namespace App\Http\Controllers;

use App\Models\Mother;
use Illuminate\Http\Request;

class MotherController extends Controller
{
    //controllers relations have no huge differences compared to the relations created by the Models
    //this is a variable created
    protected $motherModel;

    //creation of the constructor 
    public function __construct()
    {
        //the constructor must be initialised 
        $this ->motherModel = new Mother();
        
    }

    //getting Many Mothers
    public function getMothers()
    {
        return $this -> motherModel ->getMothers();
    }

    //getting a single mother
    public function getMother($motherId){
        return $this -> motherModel -> getMother($motherId);
    }

    //deleting a mother 
    public function deleteMother($motherId){
        return $this -> motherModel -> deleteMother($motherId);


    }
    //controller for the mothers to post
    public function postMother(Request $request){
        return $this ->motherModel -> postMother($request);

    }
    //controller to update for mother
    public function putMother(Request $request, $motherId){
        return $this ->motherModel -> putMother($request,$motherId);

    }




}
