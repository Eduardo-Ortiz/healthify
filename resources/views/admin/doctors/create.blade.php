@extends('layouts.admin.panel')


@section('content')




    <div class="row">

        <div class="col-lg-12">
            <h1 class="page-header"><strong>Registrar Doctor</strong></h1>

            @if(count($errors))
                <div class="alert alert-danger fade in alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Han ocurrido los siguientes errores:</strong>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{route('admin.doctors.store')}}">
                {{csrf_field()}}
                <div class="row">
                    <!-- Name Input -->
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="name">Nombre(s):</label>
                            <input required type="text" class="form-control" id="name" name="name"  value="{{old('name')}}">
                        </div>
                    </div>
                    <!-- Name Input -->
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="name">Apellido Paterno:</label>
                            <input required type="text" class="form-control" id="name" name="name"  value="{{old('name')}}">
                        </div>
                    </div>
                    <!-- Name Input -->
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="name">Apellido Materno:</label>
                            <input required type="text" class="form-control" id="name" name="name"  value="{{old('name')}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Name Input -->
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="sel1">Especialidad:</label>
                            <select class="form-control">
                                @foreach($specialities as $speciality)
                                    <option value="{{ $speciality->id }} "> {{ $speciality->nombre }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Email Input -->
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <label for="password">Costo (Consulta):</label>
                        <div class="input-group">

                            <span class="input-group-addon transparent"><strong><i class="fa fa-money fa-fw"></i></strong> </span>
                            <input required type="password" class="form-control" id="password" name="password_confirmation" >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-5 col-sm-5 col-md-5">
                        <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o fa-fw"></i> Guardar</button>
                    </div>
                </div>
            </form>


        </div>
    </div>

@stop


