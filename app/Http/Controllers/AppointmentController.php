<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    //a variable is created from here 
    protected $appointmentModel;

    //the creation of the constructor in PHP 
    public function __construct(){
        $this->appointmentModel = new Appointment();
    }
    //getting many appointments
    public function getAppointments(){
        return $this->appointmentModel->getAppointments();
    }
    //getting a single appointment
    public function getAppointment($appointmentId){
        return $this->appointmentModel->getAppointment($appointmentId);
    }
    //deleting the appointment
    public function deleteAppointment($appointmentId){
        return $this->appointmentModel->deleteAppointment($appointmentId);
    }

    //creating the function support the post activity on the model
    public function postAppointment(Request $request){
        return $this ->appointmentModel -> postAppointment($request);

    }

    //updating appointments controller
    public function putAppointment(Request $request, $appointmentId){
        return $this ->appointmentModel -> putAppointment($request,$appointmentId);

    }
}
