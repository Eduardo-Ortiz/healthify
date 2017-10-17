<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Doctor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //


    public function panelIndex()
    {
        //

        $maxHour = DB::select(DB::raw('SELECT * FROM
                              (SELECT hour,COUNT(*) AS quantity
                               FROM appointmens                                  
                               GROUP BY hour) results 
                               ORDER BY quantity 
                               DESC LIMIT 1'));

        $maxHour[0]->hour = $this::getTextHour($maxHour[0]->hour);



        $topDoctor = DB::select(DB::raw('SELECT * FROM
                              (SELECT doctor,COUNT(*) AS quantity
                               FROM appointmens                                  
                               GROUP BY doctor) results 
                               ORDER BY quantity 
                               DESC LIMIT 1'));


        $mensualIncome = Appointment::join('doctors','appointmens.doctor','=','doctors.user_id')
            ->where('created_at', '>=', Carbon::now()->startOfMonth())
            ->where('status', '=', 1)
            ->sum('costo');


        $totalAppointments = Appointment::where('created_at', '>=', Carbon::now()->startOfMonth())
            ->where('status', '=', 1)
            ->count();

        $totalDoctors = Doctor::count();





        $highestSex = DB::select(DB::raw('SELECT COUNT(*) AS quantity,sexo FROM appointmens 
                                           JOIN patients 
                                           ON appointmens.expedient=patients.user_id
                                           GROUP BY patients.sexo
                                           ORDER BY quantity 
                                           DESC LIMIT 1'));




        $maxHour[0]->hour = $this::getTextHour($maxHour[0]->hour);


        $bottomDoctor = DB::select(DB::raw('SELECT user_id, IFNULL(property_count, 0) as quantity 
                                            FROM doctors 
                                            LEFT JOIN 
                                            (SELECT doctor as did, count(*) as property_count 
                                            FROM appointmens 
                                            GROUP BY doctor) doctor_appointments 
                                            ON doctors.user_id=did 
                                            ORDER by quantity 
                                            ASC LIMIT 1'));



        $lessMedicine = DB::select(DB::raw('SELECT name, IFNULL(property_count, 0) as quantity 
                                            FROM medicines
                                            LEFT JOIN 
                                            (SELECT medicine_id as mid, count(*) as property_count 
                                            FROM recipes
                                            GROUP BY medicine_id) medicine_recipes 
                                            ON medicines.id=mid
                                            ORDER by quantity 
                                            ASC LIMIT 1'));

        $lowExistence = DB::select(DB::raw('SELECT * FROM medicines
                                            ORDER by medicines.existence 
                                            ASC LIMIT 1'));







        return view('admin.index', compact('maxHour',
            'topDoctor','mensualIncome','totalAppointments','totalDoctors',
            'highestSex','bottomDoctor', 'lessMedicine', 'lowExistence'));
    }


    public function getTextHour($hour){


        if($hour==1)
            return "8:00-9:00";
        if($hour==2)
            return "9:00-10:00";
        if($hour==3)
            return "10:00-11:00";
        if($hour==4)
            return "11:00-12:00";
        if($hour==5)
            return "12:00-13:00";
        if($hour==6)
            return "15:00-16:00";
        if($hour==7)
            return "16:00-17:00";
        if($hour==8)
            return "17:00-18:00";
        if($hour==9)
            return "18:00-19:00";
        if($hour==10)
            return "19:00-20:00";
    }
}
