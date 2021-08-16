<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class midwife extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['qualifications', 'working_status','user_id'];
    protected $dates = ['created_at','deleted_at'];

    //relationship between class midwife and rhe class appointments 
    //a one to many relationship

    public function appointments()
    {
        //the relationship means that the class midwife can associate with many appointments
        return $this->hasMany(Appointment::class);
    }
    //relationship between the user and the miodwife

public function user(){

    //class midwife belongs to class user
    
    return $this->belongsTo(User::class);
}
   //functions and methods of the models to interact with the users
   public function getMidwifes()
   {
       $midwifes = midwife::all();
       //the method to get all the appointments
       return response()->json(['midwifes' => $midwifes],200);
   }
   //getting the specific midwife with the midwife ID
   public function getMidwife($midwifeId){
       //we must first find the id through the passage of the particular Id

       $midwife = Midwife::find($midwifeId);

       //error Handling mechanisms
       if(!$midwife)
       return response()->json(['error'=>'midwife not found'],404);

       //the normal return
       return response()->json(['midwife'=>$midwife],200);
   }

       //deleting the appointment
       public function deleteMidwife($midwifeId)
       {//finding the id that is to be deleted
        $midwife = Midwife::find($midwifeId);
        //error handling mechanisms
        if(!$midwife)
        return response()->json(['error'=>'midwife not found'],404);
        //deleting the particular midwife
        $midwife->delete();
        //message from the execution
        return response()->json(['message'=>'midwife deleted succesifuly'],200);

       }

       //the function that enables posting data to the database
       //it has no difference to the get and delete functions
       public function postMidwife(Request $request){

           //the data to be posted here must be validated
           $validator = Validator::make($request->all(),
        [
            'qualifications'=>'required',
            'working_status'=>'required',
            'user_id' => 'required',
        ]);

        //what if the validation fails 
        //there must be the creation of the technique that will call up for errors
        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()]);
        }

        //posting the datas of the midwifes
        $midwife = Midwife::create([

            'qualifications'=>$request->qualifications,
            'working_status'=>$request->working_status,
            'user_id'=>$request->user_id,
        ]);

        //the response is returned by the following method
        return response()->json(['midwife'=>$midwife],201);




       }
       public function putMidwife(Request $request, $midwifeId){
           //finding the particular midiwife using the find methodology
           $midwife = Midwife::find($midwifeId);

           //error handling mechanisms
        if(!$midwife)
        return response()->json(['error'=>'midwife not found'],404);

        //updating the particularized midwife
        $midwife ->update([
            'qualifications'=>$request->qualifications,
            'working_status'=>$request->working_status,

        ]);

        //the response is returned by the following method
        return response()->json(['midwife'=>$midwife],201);


       }


   
}
