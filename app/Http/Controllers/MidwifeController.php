<?php

namespace App\Http\Controllers;

use App\Models\Midwife;
use Illuminate\Http\Request;

class MidwifeController extends Controller
{
    //creation of the controller that will communicate with the model
    //controllers have no huge differences compared to the Models created and their functions
    //creation of a variable
    protected $midwifeModel;

    //creation of the constructor
    public function __construct()
    {
        $this->midwifeModel = new Midwife();
    }

    //getting many midwifes
    public function getMidwifes(){
        return $this->midwifeModel->getMidwifes();
    }

    //getting a single midwife
    public function getMidwife($midwifeId){
        return $this->midwifeModel->getMidwife($midwifeId);
    }

    //deleting the midwife 
    public function deleteMidwife($midwifeId){
        return $this->midwifeModel ->deleteMidwife($midwifeId);

    }
    //thecontroller to deal with the posts
    public function postMidwife(Request $request){
        return $this ->midwifeModel -> postMidwife($request);

    }
      //controller that deals with updating midwifes
      public function putMidwife(Request $request, $midwifeId){
        return $this ->midwifeModel -> putMidwife($request, $midwifeId);

    }

}
