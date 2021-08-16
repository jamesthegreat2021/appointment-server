<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class UserController extends Controller
{
    //creation of the controller that will be related with the models

    //creation of the variable
    protected $userModel;
    
    //creation of the constructor with the initialization
    public function __construct()
    {
        $this ->userModel = new User();
    }
    
    //getting many users
    public function getUsers(){
        return $this->userModel->getUsers();
    }
    
    //a method to find a single user
    public function getUser($userId){
       return $this -> userModel -> getUser($userId);

    }

    //deleting the user
    public function deleteUser($userId){
return $this ->userModel ->deleteUser($userId);
    }
    //controller for the user to post
    public function postUser(Request $request){
        return $this ->userModel -> postUser($request);

    }
    //controller for user update
    public function putUser(Request $request, $userId){
        return $this ->userModel -> putUser($request, $userId);

    }

    //controller for registering the user
    public function register(Request $request){
        return $this -> userModel -> register($request);

    }

        
    

}
