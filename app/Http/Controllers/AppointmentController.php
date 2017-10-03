<?php

namespace App\Http\Controllers;

use App\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        $patient = Auth::user()->id;
        $appointments=Appointment::all()->where('expedient','=',$patient);

        return view('patient.appointments.index',compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $format = 'd/m/Y';

        $date = Carbon::createFromFormat($format, $request->get('date'));
        //
        $appointment=new Appointment();
        $appointment->appointment_date=$date;
        $appointment->expedient=Auth::user()->id;
        $appointment->doctor=request("doctor");
        $appointment->hour=request("hour");
        $appointment->status=0;
        $appointment->save();

        session()->flash('status', 'Cita creada correctamente!');

        return redirect('patient');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }

    public function getUsedHours(Request $request)
    {


        $format = 'd/m/Y';



        $date = Carbon::createFromFormat($format, $request->get('date'));

        $date = substr($date, 0,-9);


        $doctor = $request->get('doctor');

        return Appointment::where('appointment_date','=',$date)
            ->where('doctor','=',$doctor)
            ->get();




    }
}
