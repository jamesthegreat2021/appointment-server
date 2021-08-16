<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //firstly wemust create the controller that will communicate with the model
    //creation of a single variable
    protected $paymentModel;

    //creating the constructor
    public function __construct()
    {
        $this -> paymentModel = new Payment();
    }
    
    public function getPayments()
    {
        //getting many payments
        return $this -> paymentModel ->getPayments();
    
}
     //getting a single payment
     public function getPayment($paymentId){
         return $this -> paymentModel ->getPayment($paymentId);
     }

     //deleting a single payment
     public function deletePayment($paymentId){
         return $this -> paymentModel -> deletePayment($paymentId);

     }
     //controller to deal with the post of the payments
     public function postPayment(Request $request){
        return $this ->paymentModel -> postPayment($request);

    }
    //controller to update payments
    public function putPayment(Request $request, $paymentId){
        return $this ->paymentModel -> putPayment($request,$paymentId);

    }

}
