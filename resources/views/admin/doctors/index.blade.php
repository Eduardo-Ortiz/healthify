@extends('layouts.admin.panel')


@section('content')


    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><strong>Doctores</strong></h1>

            @if(session()->has('status'))
                <div class="alert alert-success fade in alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{session('status')}}</strong>
                </div>
            @endif


            @if(count($doctors))
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>N°</th>
                        <th>Nombre</th>
                        <th>Especialidad</th>
                        <th>Editar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($doctors as $doctor)
                        <tr>
                            <td>{{$doctor->doctor->id}}</td>
                            <td>{{$doctor->doctor->nombre}} {{$doctor->doctor->apellido_paterno}} {{$doctor->doctor->apellido_materno}}</td>
                            <td>{{$doctor->doctor->speciality->nombre}}</td>
                            <td style="width: 1px"><a href="{{route('admin.doctors.edit', $doctor->id)}}" class="btn btn-default btn-xs">Seleccionar</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h4>No hay ningún trabajador registrado. Visite la <strong><a href="{{url('admin/doctors/create')}}">Pagina de Registro</a></strong> para agregar datos.</h4>
            @endif
        </div>


    </div>
@stop
