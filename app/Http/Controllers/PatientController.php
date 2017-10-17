<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Patient;
use App\Recipe;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }

    public function registerStore(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|max:20',
            'password' => 'required|min:6',
            'nombre' => 'required',
            'ap_paterno' => 'required',
            'ap_materno' => 'required',
            'foto' => 'required',
            'sexo' => 'required',
            'edad' => 'required',
        ]);

        $user=new User();
        $user->name=request("name");
        $user->password=bcrypt(request('password'));
        $user->role_id=3;
        $user->save();

        request()->file('foto')->store('public/patient_photos');
        $ruta_foto=$request->file('foto')->hashName();

        $patient = new Patient();
        $patient->nombre=request("nombre");
        $patient->apellido_paterno=request("ap_paterno");
        $patient->apellido_materno=request("ap_materno");
        $patient->sexo=request("sexo");
        $patient->edad=request("edad");
        $patient->ruta_foto=$ruta_foto;

        $user->patient()->save($patient);

        //session()->flash('status', 'Doctor '. $doctor->name .' creado correctamente!');

        Auth::login($user);

        return redirect('/patient');
    }

    public function recipes()
    {

        $patient = Auth::user()->id;
        $appointments=Appointment::all()
            ->where('expedient','=',$patient)
            ->where('status',1);


        return view('patient.recipes.index',compact('appointments'));

    }

    public function data()
    {

        $patient = Auth::user()->id;
        $appointments=Appointment::all()
            ->where('expedient','=',$patient)
            ->where('status',1);


        return view('patient.data',compact('appointments'));

    }

    public function getList()
    {
        $patients = User::all()->where('role_id','=','3');





        return view('admin.patients.index',compact('patients'));
    }

    public function getLessAppointments()
    {

        $patients = User::where('role_id','=','3')->get()->sortBy(function($hackathon)
        {
            return $hackathon->patient->appointments()->count();
        })->take(5);




        return view('admin.patients.list',compact('patients'));
    }

}
