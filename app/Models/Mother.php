<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//important to import softdeletes
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Mother extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['date_of_birth', 'gravida','user_id'];
    protected $dates = ['date_of_birth', 'deleted_at', 'created_at'];

    //relations always represented in the form of the function because of the PHP
    
    public function appointments()
    {
        //the relationship is that a single mother can have many appointments

      return $this->hasMany(Appointment::class);
    }
    //relationship between mother and the user to where mother belongs to user 
    public function user()
    {
        //mother will always belongs to user
        return $this->belongsTo(User::class);
    }

    //here comes the functions and the methods 

    public function getMothers(){
        //initialising all the mothers
        $mothers = Mother::all();

        //A method to call all mothers 
        return response()->json(['mothers' => $mothers], 200);
    }
    //a method and function to get one mother with an id
    public function getMother($motherId){
         
        //we must find the Id through the find Method
        $mother = Mother::find($motherId);

        //error handling mechanism
        if(!$mother)
        return response()->json(['error'=>'mother not found'],404);

        //the normal return 
        return response()->json(['mother'=>$mother,200]);

    }

    //deleting a mother with a particular Id
    public function deleteMother($motherId){
        //we must first find the identity of a mother through the Id
        $mother = Mother::find($motherId);

        //error handling mechanisms
        if(!$mother)
        return response()->json(['error'=>'mother not found'],404);

        //the normal flow
        return response()->json(['message'=>'mother deleted succesifully'],200);


    }
    //post functions

    public function postMother(Request $request){
      
        //data validation
        $validator = Validator::make($request->all(),[
        //the data to be inserted in here are the ones in the fillables cases
        'date_of_birth'=>'required',
        'gravida'=>'required',
        'user_id'=>'required',

        ]);
        //what if the data arent appropiate
        if($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()]);

        }
        //giving the ability to post
        $mother = Mother::create([
            'date_of_birth'=>$request->date_of_birth,
            'gravida' =>$request->gravida,
            'user_id' =>$request ->user_id,
        
        ]);
        return response()->json(['mother'=>$mother],201);


    }
    public function putMother(Request $request, $motherId){

        //finding the specific mother through the initialized Id
        $mother = Mother::find($motherId);

        //error handling mechanisms
        if(!$mother)
        return response()->json(['error'=>'mother not found'],404);


        //updating the mother functionality
        $mother ->update([

            'date_of_birth'=>$request->date_of_birth,
            'gravida' =>$request->gravida,
        ]);

return response()->json(['mother'=>$mother],201);


    }

}
