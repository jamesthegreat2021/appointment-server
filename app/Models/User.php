<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Notifications\Notifiable;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Validation\Rules\Password;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
        'email',
        'password',
        'phone_number',
        'username',
        
        

    ];
    protected $dates = ['created_at','deleted_at'];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //relationship between the user and mother to where the user where mother belongs to user

    public function mother()
    {
        //mother belongs to user
        return $this->hasOne(Mother::class);
    }
    public function midwife()
    {
        //midwife belongs to user
        return $this->hasOne(Midwife::class);
    }
    //starting with the functions on the users
    public function getUsers()
    {
     //accessing all the users in a row
     $users = User::all();

     //the method to get all the users
     return response()->json(['users'=>$users],200);


    }

    //getting the user wwith the specified user id
    public function getUser($userId){

        //getting and finding the specified user
        $user = User::find($userId);

        //error handling mechanisms
        if(!$user)
        return response()->json(['error'=>'user not found'],404);


        ////a method to get a single users
        return response()->json(['user'=> $user],200);

    }
    //a method to delete a user
    public function deleteUser($userId)
    {
        //a method to find the specified user through the specified user Id
         $user = User::find($userId);

         ////error handling mechanism
         if(!$user)
         return response()-> json(['error'=>'user not found'],404);

         //method to delete a particular user
         $user -> delete();

         //message from the execution
         return response() ->json(['message'=>'user deketed succesifuly'],200);
    }
    //posting functionality
    public function postUser(Request $request){
     //validation first
     $validator = Validator::make($request->all(),[
       'username'=>'required',
       'email'=>'required|unique:users',
       'password'=>'required|unique:users',
       'phone_number'=>'required|unique:users',
       
       


     ]);
     //if the validator fails
     if($validator->fails()){

        return response()->json(['error'=>$validator->errors()]);
    }
    $user = User::create([
      'username'=>$request->username,
      'email'=>$request->email,
      'password'=>$request->password,
      'phone_number'=>$request->phone_number,
      'location'=>$request->location,
      'longitude'=>$request->longitude,
      'latitude'=>$request->latitude,
      

    ]);
    return response()->json(['user'=>$user],201);

    }
    public function putUser(Request $request, $userId){
        //a method to find the specified user through the specified user Id
        $user = User::find($userId);

        ////error handling mechanism
        if(!$user)
        return response()-> json(['error'=>'user not found'],404);

        //updating user details
        $user -> update([
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>$request->password,
            'phone_number'=>$request->phone_number,
            


        ]);
        return response()->json(['user'=>$user],201);


    }
    Public function register(Request $request){
        //validator for the registration of the new user
        $validator = Validator::make($request->all(),[
            'username'=>'required',
            'email'=>'email|unique:users',
            'password' => 'required',
            'phone_number'=>'unique:users',
            ]);
            //if the validator fails
     if($validator->fails()){

        return response()->json(['error'=>$validator->errors()]);
    }

    //create the user
    $user = User::create([
        'username'=>$request->username,
        'email'=>$request->email,
        'password'=>Hash::make($request->password),
        'phone_number'=>$request->phone_number,
    ]);
}
}
