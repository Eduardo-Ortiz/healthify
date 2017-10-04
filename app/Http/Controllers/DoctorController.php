<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Doctor;
use App\Speciality;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $doctors=User::all()->where('role_id','=','2');

        return view('admin.doctors.index',compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $specialities = Speciality::all();

        return view('admin.doctors.create',compact('specialities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:20',
            'contraseña' => 'required|min:6',
            'nombre' => 'required',
            'ap_paterno' => 'required',
            'ap_materno' => 'required',
            'foto' => 'required',
            'costo' => 'required',
        ]);

        $user=new User();
        $user->name=request("name");
        $user->password=bcrypt(request('password'));
        $user->role_id=2;
        $user->save();

        request()->file('foto')->store('public/worker_photos');
        $ruta_foto=$request->file('foto')->hashName();

        $doctor = new Doctor();
        $doctor->nombre=request("nombre");
        $doctor->apellido_paterno=request("ap_paterno");
        $doctor->apellido_materno=request("ap_materno");
        $doctor->costo=request("costo");
        $doctor->ruta_foto=$ruta_foto;
        $doctor->especialidad=request("especialidad");

        $user->doctor()->save($doctor);

        session()->flash('status', 'Doctor '. $doctor->name .' creado correctamente!');

        return redirect('/admin/doctors');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(User $doctor)
    {

        //
        $specialities = Speciality::all();
        return view('admin.doctors.edit',compact('doctor','specialities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $doctor)
    {

        $this->validate($request, [
            'password' => 'nullable'
        ]);
        $input=array_filter($request->all());
        if(request('password')!=null)
        {
            $input['password']=bcrypt($input['password']);
        }

        if($request->hasFile('foto'))
        {

            $request->file('foto')->store('public/worker_photos');
            $name=$request->file('foto')->hashName();
            $doctor->doctor()->update(['ruta_foto' => $name]);
        }

        $doctor->update($input);

        $doctor->doctor()->update(['nombre' => request('nombre')]);
        $doctor->doctor()->update(['apellido_paterno' => request('ap_paterno')]);
        $doctor->doctor()->update(['apellido_materno' => request('ap_materno')]);
        $doctor->doctor()->update(['especialidad' => request('especialidad')]);
        $doctor->doctor()->update(['costo' => request('costo')]);

        session()->flash('status', 'Doctor '. $doctor->name .' actualizado correctamente!');

        return redirect('/admin/doctors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $doctor)
    {
        //
        session()->flash('status', 'Doctor '. $doctor->name .' eliminado correctamente!');

        $doctor->delete();

        return redirect('/admin/doctors');
    }

    public function getFromSpeciality(Request $request)
    {

        $speciality_id = $request->get('speciality_id');
        return Doctor::where('especialidad','=',$speciality_id)
            ->get();
    }

    public function showAppointment(Appointment $appointment)
    {
        //
        return view('doctors.appointment',compact('appointment'));
    }

    public function mainPanel(){
        $carbon = new Carbon();
        $date = substr($carbon, 0,-9);

        $time=$carbon->format('H:i');

        $currentHour = $this->hourtoInt($time);

        $appointment = Appointment::where('appointment_date','=',$date)
            ->where('doctor','=',Auth::user()->id)
            ->where('hour','=',$currentHour)
            ->where('status','=',0)
            ->first();

        return view('doctors.index',compact('appointment'));
    }



    private static function hourToInt($hour)
    {
        if ($hour >= "8:00" && $hour <= "9:00") {
            return 1;
        }
        else if ($hour >= "9:00" && $hour <= "10:00") {
            return 2;
        }
        else if ($hour >= "10:00" && $hour <= "11:00") {
            return 3;
        }
        else if ($hour >= "11:00" && $hour <= "12:00") {
            return 4;
        }
        else if ($hour >= "12:00" && $hour <= "13:00") {
            return 5;
        }
        else if ($hour >= "15:00" && $hour <= "16:00") {
            return 6;
        }
        else if ($hour >= "16:00" && $hour <= "17:00") {
            return 7;
        }
        else if ($hour >= "17:00" && $hour <= "18:00") {
            return 8;
        }
        else if ($hour >= "18:00" && $hour <= "19:00") {
            return 9;
        }
        else if ($hour >= "19:00" && $hour <= "20:00") {
            return 10;
        }
        else {
            return 0;
        }

    }
}
