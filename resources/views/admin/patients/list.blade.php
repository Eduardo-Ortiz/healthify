@extends('layouts.admin.panel')


@section('content')


    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><strong>Pacientes con Menos citas</strong></h1>

            @if(session()->has('status'))
                <div class="alert alert-success fade in alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{session('status')}}</strong>
                </div>
            @endif


            @if(count($patients))
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>N° de Expediente</th>
                        <th>Nombre</th>
                        <th>Cantidad de Citas</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($patients as $patient)
                        <tr>
                            <td>{{$patient->patient->id}}</td>
                            <td>{{$patient->patient->nombre}} {{$patient->patient->apellido_paterno}} {{$patient->patient->apellido_materno}}</td>
                            <td>{{$patient->patient->appointments->count()}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h4>No hay ningún paciente registrado.</h4>
            @endif
        </div>


    </div>
@stop
