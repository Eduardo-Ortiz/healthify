@extends('layouts.admin.panel')


@section('content')


    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><strong>Medicinas</strong></h1>

            @if(session()->has('status'))
                <div class="alert alert-success fade in alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{session('status')}}</strong>
                </div>
            @endif


            @if(count($medicines))
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>N°</th>
                        <th>Nombre</th>
                        <th>Existencia</th>
                        <th>Presentación</th>
                        <th>Uso</th>
                        <th>Editar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($medicines as $medicine)
                        <tr>
                            <td>{{$medicine->id}}</td>
                            <td>{{$medicine->name}}</td>
                            <td>{{$medicine->existence}}</td>
                            <td>{{$medicine->presentation->name}}</td>
                            <td>{{$medicine->purpose->name}}</td>
                            <td style="width: 1px"><a href="{{route('admin.medicines.edit', $medicine->id)}}" class="btn btn-default btn-xs">Seleccionar</a></td>
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
