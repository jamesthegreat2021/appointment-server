<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Appointment extends Model
{

    protected $fillable = ['booking_status', 'price', 'location', 'longitude', 'latitude', 'date', 'time','mother_id','midwife_id'];
    protected $dates = ['date', 'deleted_at', 'created_at',];
    use HasFactory, SoftDeletes;
    //relations 

    public function mother()
    {

        return $this->belongsTo(Mother::class);
    }
    //relationship between 
    public function midwife()
    {
        return $this->belongsTo(Midwife::class);
    }
    //relation to payment
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
    //functions/methods 
    //Static functions always retain their values
    public function getAppointments()
    {

        $appointments = appointment::all();
        //getting all appointments
        return response()->json(['appointments' => $appointments], 200);}
        //to get a specific appointment with a specific appointment id
        public function getAppointment($appointmentId){
            $appointment = Appointment::find($appointmentId);
            //error handling mechanism if the appointment is not found
            if(!$appointment)
            return response()->json(['error'=>'appointment not found'],404);

            //normal return
            return response()->json(['appointment'=>$appointment],200);}

            //deleting the appointment
            public function deleteAppointment($appointmentId){
                $appointment = Appointment::find($appointmentId);
                //error handling mechanism
                if(!$appointment)
                return response()->json(['error'=>'appointment not found'],404);
                //deleting the particular appointment
                $appointment->delete();
                return response()->json(['message'=>'appointment deleted succesifuly'],201);

            }

            // The function to post data to the database 
            public function postAppointment(Request $request)
            {
                //the data must be validated through the rules defined by us
                $validator = Validator::make($request->all(),
                ['booking_status'=>'required',
                'price'=>'required',
                'location'=>'required',
                'longitude'=>'required',
                'latitude'=>'required',
                'date'=>'required',
                'time'=>'required',
                'mother_id'=>'required',
                'midwife_id'=>'required',


            ]);

            if($validator->fails()){

                return response()->json(['error'=>$validator->errors()]);

            }
            //creting the appointment through the two ways
            //This is the first way to create the appointments
            //Post means posting new data to the database 
            $appointment =Appointment::create(
                [
                    'price'=>$request->price,
                    'booking_status'=>$request->booking_status,
                    'location'=>$request->location,
                    'longitude'=>$request->longitude,
                    'latitude'=>$request->latitude,
                    'date'=>$request->date,
                    'time'=>$request->time,
                    'mother_id'=>$request->mother_id,
                    'midwife_id'=>$request->midwife_id,
                    
                ]

                );
                return response()->json(['appointment'=>$appointment],201);

            }
            //
            public function putAppointment(Request $request, $appointmentId)
            {
                //finding the appointment
                $appointment = Appointment::find($appointmentId);


                //error handling mechanism
                if(!$appointment)
                return response()->json(['error'=>'appointment not found'],404);

                //updating the appointment
                $appointment -> update([
                    'price'=>$request->price,
                    'booking_status'=>$request->booking_status,
                    'location'=>$request->location,
                    'longitude'=>$request->longitude,
                    'latitude'=>$request->latitude,
                    'date'=>$request->date,
                    'time'=>$request->time,
                    'mother_id'=>$request->mother_id,
                    'midwife_id'=>$request->midwife_id,

                ]);
                return response()->json(['appointment'=>$appointment],201);




 }
            
          


        
    
}
