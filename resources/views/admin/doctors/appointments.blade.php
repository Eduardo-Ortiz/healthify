@extends('layouts.admin.panel')


@section('content')


    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><strong>Pacientes Atendidos por {{$doctor->getFullName()}}</strong></h1>

            @if(session()->has('status'))
                <div class="alert alert-success fade in alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{session('status')}}</strong>
                </div>
            @endif


            @if(count($appointments))
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>N°</th>
                        <th>Paciente</th>
                        <th>Fecha</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($appointments as $appointment)
                        <tr>
                            <td>{{$appointment->id}}</td>
                            <td>{{$appointment->patient->patient->nombre}} {{$appointment->patient->patient->apellido_paterno}} {{$appointment->patient->patient->apellido_materno}}</td>
                            <td>{{$appointment->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h4>Este doctor no tiene ninguna cita registrada.</h4>
            @endif
        </div>


    </div>
@stop
