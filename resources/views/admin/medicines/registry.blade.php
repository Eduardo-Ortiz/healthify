@extends('layouts.admin.panel')


@section('content')


    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><strong>Historial de Medicinas</strong></h1>

            @if(session()->has('status'))
                <div class="alert alert-success fade in alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{session('status')}}</strong>
                </div>
            @endif


            @if(count($recipes))
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Medicina</th>
                        <th>Cantidad</th>
                        <th>Recetado A</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($recipes as $recipe)
                        <tr>
                            <td>{{$recipe->medicine->name}}</td>
                            <td>{{$recipe->quantity}}</td>
                            <td>{{$recipe->appointment->patient->patient->nombre}} {{$recipe->appointment->patient->patient->apellido_paterno}} {{$recipe->appointment->patient->patient->apellido_materno}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h4>No hay ninguna medicina registrada. Visite la <strong><a href="{{url('admin/medicines/create')}}">Pagina de Creación</a></strong> para agregar medicinas.</h4>
            @endif
        </div>


    </div>
@stop
