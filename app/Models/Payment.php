<?php

namespace App\Models;

use Faker\Provider\ar_SA\Payment as Ar_SAPayment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class payment extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['payment_status','date','time','appointment_id'];
    protected $dates = ['date', 'created_at', 'deleted_at'];
    //relations
public function appointment()
{
    return $this->belongsTo(Appointment::class);
}
//dealing with methods and the functions

//a method to get all the payments
    public function getPayments(){
    //initialisation of the method to get all the payments
    $payments = payment::all();
    
    //a method to call all the payments
    return response() ->json(['payments'=>$payments],200);


    }
    //a method to call a specific payment with an Id
    public function getPayment($paymentId){
        
        //finding the particularized Id
        $payment = Payment::find($paymentId);

        //error handling mechanism
        if(!$payment)
        return response()->json(['error'=> 'payment not found'],404);

        //the normal flow
        return response()->json(['payment'=>$payment],200);

    }
    //deleting the particularized payments
    public function deletePayment($paymentId){

        //finding the particular payment to be deleted
        $payment = Payment::find($paymentId);

        //error handling mechanism
        if(!$payment)
        return response()->json(['error'=>'payment not found']);

        //deleting the payment
        $payment -> delete();

        //what if the payment exist
        return response()->json(['message'=>'payment deleted succesifuly'],200);

    }
    //post functionability
    public function postPayment(Request $request){
        //validating the data
        $validator = Validator::make($request->all(),[
            //data to be verified
            'date'=>'required',
            'time'=> 'required',
            'payment_status'=>'required',
            'appointment_id'=>'required',
        ]);

        //innapropiate data handling
        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()]);
        }
        //giving the ability to post
        $payment = Payment::create([
            'date'=>$request->date,
            'time'=>$request->time,
            'payment_status'=>$request->payment_status,
            'appointment_id'=>$request->appointment_id,


        ]);
        return response()->json(['payment'=>$payment],201);
    }
    public function putPayment(Request $request, $paymentId){

        //finding the particular payment
        $payment = Payment::find($paymentId);

        //error handling mechanism
        if(!$payment)
        return response()->json(['error'=>'payment not found']);

        //updating payments
        $payment -> update([
            'date'=>$request->date,
            'time'=>$request->time,
            'payment_status'=>$request->payment_status,

        ]);


        return response()->json(['payment'=>$payment],201);





    }
    
}