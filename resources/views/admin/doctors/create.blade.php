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

            <form method="POST" action="{{route('admin.doctors.store')}}" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="row">
                    <!-- Name Input -->
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="name">Usuario:</label>
                            <input required type="text" class="form-control" id="name" name="name"  value="{{old('name')}}">
                        </div>
                    </div>
                    <!-- Name Input -->
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="name">Contraseña:</label>
                            <input required type="password" class="form-control" id="contraseña" name="contraseña"  value="{{old('contraseña')}}">
                        </div>
                    </div>
                </div>



                <div class="row">
                    <!-- Name Input -->
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="name">Nombre(s):</label>
                            <input required type="text" class="form-control" id="nombre" name="nombre"  value="{{old('nombre')}}">
                        </div>
                    </div>
                    <!-- Name Input -->
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="name">Apellido Paterno:</label>
                            <input required type="text" class="form-control" id="ap_paterno" name="ap_paterno"  value="{{old('ap_paterno')}}">
                        </div>
                    </div>
                    <!-- Name Input -->
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="name">Apellido Materno:</label>
                            <input required type="text" class="form-control" id="ap_materno" name="ap_materno"  value="{{old('ap_materno')}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <label for="Foto">Elegir Fotografía:</label>
                        <!-- image-preview-filename input [CUT FROM HERE]-->
                        <div class="input-group image-preview">
                            <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                            <span class="input-group-btn">
                        <!-- image-preview-clear button -->
                        <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                            <i class="fa fa-times fa-fw"></i> Limpiar
                        </button>
                                <!-- image-preview-input -->
                        <div class="btn btn-default image-preview-input">
                            <i class="fa fa-folder-open-o fa-fw"></i>
                            <span class="image-preview-input-title">Buscar</span>
                            <input style="opacity: 0;" type="file" accept="image/png, image/jpeg, image/gif" name="foto"/> <!-- rename it -->
                        </div>
                    </span>
                        </div><!-- /input-group image-preview [TO HERE]-->
                    </div>


                    <!-- Name Input -->
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="sel1">Especialidad:</label>
                            <select class="form-control" name="especialidad" id="especialidad">
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
                            <input required type="number" class="form-control" id="costo" name="costo" >
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


