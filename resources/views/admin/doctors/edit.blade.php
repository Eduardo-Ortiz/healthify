@extends('layouts.admin.panel')


@section('content')




    <div class="row">

        <div class="col-lg-12">
            <h1 class="page-header"><strong>Editar Doctor</strong></h1>

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

            <form method="POST" action="{{route('admin.doctors.update',$doctor->id)}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PUT" />
                <div class="row">
                    <div class="col-md-2 col-xs-2 col-sm-2">

                        <img style="object-fit: contain;height: 135px" class="img-responsive img-thumbnail" src="{{URL::asset($doctor->doctor->ruta_foto)}}" alt="Mountain View">

                    </div>

                    <!-- Name Input -->
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="name">Usuario:</label>
                            <input required type="text" class="form-control" id="name" name="name"  value="{{$doctor->name}}">
                        </div>
                    </div>
                    <!-- Name Input -->
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="name">Contraseña:</label>
                            <input type="password" class="form-control" id="password" name="password" >
                        </div>
                    </div>


                        <!-- Name Input -->
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                                <label for="name">Nombre(s):</label>
                                <input required type="text" class="form-control" id="nombre" name="nombre"  value="{{$doctor->doctor->nombre}}">
                            </div>
                        </div>
                        <!-- Name Input -->
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                                <label for="name">Apellido Paterno:</label>
                                <input required type="text" class="form-control" id="ap_paterno" name="ap_paterno"  value="{{$doctor->doctor->apellido_paterno}}">
                            </div>
                        </div>
                        <!-- Name Input -->
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                                <label for="name">Apellido Materno:</label>
                                <input required type="text" class="form-control" id="ap_materno" name="ap_materno"  value="{{$doctor->doctor->apellido_materno}}">
                            </div>
                        </div>
                    </div>






                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4">

                        <label for="Foto">Cambiar Fotografía:</label>
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
                                    <option {{ ( $doctor->doctor->especialidad == $speciality->id ) ? 'selected' : '' }} value="{{ $speciality->id }} "> {{ $speciality->nombre }}  </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Email Input -->
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <label for="password">Costo (Consulta):</label>
                        <div class="input-group">

                            <span class="input-group-addon transparent"><strong><i class="fa fa-money fa-fw"></i></strong> </span>
                            <input required type="number" class="form-control" id="costo" name="costo" value="{{$doctor->doctor->costo}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-5 col-sm-5 col-md-5">
                        <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o fa-fw"></i> Guardar Cambios</button>
                    </div>
                </div>
            </form>

            <div class="row">
                <br>
                <br>
                <div class="col-xs-3 col-sm-3 col-md-3 pull-right">
                    <button type="button" class="btn pull-right btn-danger btn-lg" data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-trash fa-fw"></i> Eliminar Doctor</button>
                </div>
            </div>


        </div>
    </div>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title"><strong>Eliminar Trabajador</strong></h3>
                </div>
                <div class="modal-body">
                    <h4>Estas a punto de eliminar al doctor <strong>{{$doctor->name}}</strong>. Esta accion no podra revertirse,
                        ¿Estas seguro?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>


                    <form method="POST" class="col-xs-4 col-sm-4 col-md-4 pull-right" action="{{route('admin.doctors.destroy',$doctor->id)}}">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="DELETE" />
                        <button type="submit" class="btn btn-danger">Estoy seguro, eliminar</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

@stop


