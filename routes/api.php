<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\MidwifeController;
use App\Http\Controllers\MotherController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//////////// Routes for the APPOINTMENTS.

//route for many appointments
Route::get('appointments',[AppointmentController::class,'getAppointments']);
//route for the post appointment
Route::post('appointment',[AppointmentController::class,'postAppointment']);
//route for the single appointment
Route::get('appointment/{appointmentId}',[AppointmentController::class,'getAppointment']);
//route for updating appointment
Route::put('appointment/{appointmentId}',[AppointmentController::class,'putAppointment']);
//route for deleting an appointment
Route::delete('appointment/{appointmentId}',[AppointmentController::class,'deleteAppointment']);

//////////// END FOR THE APPOINTMENT ROUTES



////////ROUTES FOR THE MIDWIDES

//route for many midwifes 
Route::get('midwifes',[MidwifeController::class,'getMidwifes']);
//route for post midwife
Route::post('midwife',[MidwifeController::class,'postMidwife']);
//Route for the single appointment with the appointment Id
Route::get('midwife/{midwifeId}',[MidwifeController::class,'getMidwife']);
//route for updating midwife
Route::put('midwife/{midwifeId}',[MidwifeController::class,'putMidwife']);
//Route for deleting the midwife with the midwife Id
Route::delete('midwife/{midwifeId}',[MidwifeController::class,'deleteMidwife']);

///////////END FOR THE ROUTES OF THE MIDWIFES



//////////ROUTES FOR MOTHERS

//routes for Many Mothers
Route::get('mothers',[MotherController::class, 'getMothers']);
//route for post mother
Route::post('mother',[MotherController::class,'postMother']);
//Routes for a single mom
Route::get('mother/{motherId}',[MotherController::class,'getMother']);
//route for updating a mother
Route::put('mother/{motherId}',[MotherController::class,'putMother']);
//Route for deleting a mother
Route::delete('mother/{motherId}',[MotherController::class,'deleteMother']);

/////////////END FOR THE ROUTES FOR MOTHER




////////////ROUTES FOR PAYMENTS

//routes for many payments
Route::get('payments',[PaymentController::class, 'getPayments']);
//route for post payment
Route::post('payment',[PaymentController::class,'postPayment']);
//route for the single payment
Route::get('payment/{paymentId}',[PaymentController::class,'getPayment']);
//route for updating payments
Route::put('payment/{paymentId}',[PaymentController::class,'putPayment']);
//route for deleting a payment
Route::delete('payment/{paymentId}',[PaymentController::class, 'deletePayment']);

/////////////END FOR THE ROUTES OF THE PAYMENTS



////////ROUTES FOR THE USER
//route for many users
Route::get('users',[UserController::class, 'getUsers']);
//route for user post
Route::post('user',[UserController::class,'postUser']);
//Route for registering the user
Route::post('user/register',[UserController::class,'register']);
//route for a single user
Route::get('user/{userId}',[UserController::class, 'getUser']);
//route for updating user
Route::put('user/{userId}',[UserController::class, 'putUser']);
//route for deleting a user
Route::delete('user/{userId}',[UserController::class, 'deleteUser']);

////////////END FOR THE ROUTES OF THE USER
