@extends('layouts.admin.panel')


@section('content')


    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><strong>Usos de Medicina</strong></h1>

            @if(session()->has('status'))
                <div class="alert alert-success fade in alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{session('status')}}</strong>
                </div>
            @endif


            <form method="POST" action="{{route('admin.medicines.purposes.store')}}" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="row">
                    <!-- Name Input -->
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="name">Nuevo Uso:</label>
                            <input required type="text" class="form-control" id="name" name="name"  value="{{old('name')}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-5 col-sm-5 col-md-5">
                        <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o fa-fw"></i> Guardar</button>
                    </div>
                </div>
            </form>

            <br>
            @if(count($purposes))
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Uso</th>
                        <th>Medicamentos</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($purposes as $purpose)
                        <tr>
                            <td>{{$purpose->name}}</td>
                                <td style="width: 1px"><a href="{{route('admin.purpose.medicines', $purpose->id)}}" class="btn btn-default btn-xs">Buscar</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h4>No hay ningún uso de Medicina registrado.</h4>
            @endif



        </div>


    </div>
@stop
