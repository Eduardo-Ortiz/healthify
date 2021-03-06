<?php

namespace App\Http\Controllers;

use App\Medicine;
use App\Presentation;
use App\Purposes;
use App\Recipe;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $medicines=Medicine::all();

        return view('admin.medicines.index',compact('medicines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $purposes = Purposes::all();
        $presentations = Presentation::all();
        return view('admin.medicines.create',compact('purposes','presentations'));
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
        $this->validate($request, [
            'name' => 'required|max:20',
            'existence' => 'required',
        ]);

        $medicine=new Medicine();
        $medicine->name=request("name");
        $medicine->existence=request("existence");
        $medicine->purpose_id=request("purpose");
        $medicine->presentation_id=request("presentation");
        $medicine->save();

        session()->flash('status', 'Medicina '. $medicine->name .' creada correctamente!');

        return redirect('/admin/medicines');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        //
        $purposes = Purposes::all();
        $presentations = Presentation::all();
        return view('admin.medicines.edit',compact('medicine','purposes','presentations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicine $medicine)
    {
        //

        $medicine->update(['name' => request('name')]);
        $medicine->update(['existence' => request('existence')]);
        $medicine->update(['purpose_id' => request('purpose')]);
        $medicine->update(['presentation_id' => request('presentation')]);

        session()->flash('status', 'Medicina '. $medicine->name .' actualizada correctamente!');

        return redirect('/admin/medicines');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        //
        session()->flash('status', 'Medicina '. $medicine->name .' eliminada correctamente!');

        $medicine->delete();

        return redirect('/admin/medicines');
    }

    public function purposesIndex()
    {
        $purposes=Purposes::all();
        return view('admin.purposes.index', compact('purposes'));
    }

    public function storePurpose(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:30',
        ]);

        $purpose=new Purposes();
        $purpose->name=request("name");
        $purpose->save();

        session()->flash('status', 'Uso '. $purpose->name .' creado correctamente!');

        return redirect('/admin/medicines/purposes');
    }

    public function presentationsIndex()
    {
        $presentations=Presentation::all();
        return view('admin.presentations.index', compact('presentations'));
    }

    public function storePresentation(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:30',
        ]);

        $presentation=new Presentation();
        $presentation->name=request("name");
        $presentation->save();

        session()->flash('status', 'Presentación '. $presentation->name .' creada correctamente!');

        return redirect('/admin/medicines/presentations');
    }


    public function search(Request $request)
    {
        $input = $request->get('input');

        if($input=="")
            return null;
        else
            return Medicine::where('medicines.name', 'LIKE', $input.'%')
                ->join('presentations','medicines.presentation_id','=','presentations.id')
                ->select('medicines.*', 'presentations.name as presentation_name')
                ->get();
    }


    public function data(Request $request)
    {
        $input = $request->get('medicine');

        if($input=="")
            return null;
        else
            return Medicine::where('medicines.id', '=', $input)
                ->join('presentations','medicines.presentation_id','=','presentations.id')
                ->join('purposes','medicines.purpose_id','=','purposes.id')
                ->select('medicines.*', 'presentations.name as presentation_name','purposes.name as purpose_name')
                ->first();
    }

    public function searchAlternatives(Request $request)
    {
        $purpose = $request->get('prupose');
        $quantity = $request->get('quantity');


            return Medicine::join('presentations','medicines.presentation_id','=','presentations.id')
                ->join('purposes','medicines.purpose_id','=','purposes.id')
                ->select('medicines.*', 'presentations.name as presentation_name')
                ->where('purposes.id', '=', $purpose)
                ->where('medicines.existence', '>=', $quantity)
                ->get();
    }


    public function registry()
    {
        $recipes = Recipe::all();

        return view('admin.medicines.registry',compact('recipes'));
    }


    public function purposeMedicines(Purposes $purpose)
    {
        $medicines = Medicine::where('purpose_id','=',$purpose->id)->get();


        return view('admin.medicines.purposes',compact('medicines','purpose'));
    }
}
