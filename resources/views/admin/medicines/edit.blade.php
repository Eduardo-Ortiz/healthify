@extends('layouts.admin.panel')


@section('content')




    <div class="row">

        <div class="col-lg-12">
            <h1 class="page-header"><strong>Registrar Medicamento</strong></h1>

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

            <form method="POST" action="{{route('admin.medicines.update',$medicine->id)}}" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT" />
                {{csrf_field()}}
                <div class="row">
                    <!-- Name Input -->
                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input required type="text" class="form-control" id="name" name="name"  value="{{$medicine->name}}">
                        </div>
                    </div>
                    <!-- Name Input -->
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <label for="password">Existencia:</label>
                        <div class="input-group">
                            <span class="input-group-addon transparent"><strong>#</strong> </span>
                            <input required type="number" class="form-control" id="existence" name="existence" value="{{$medicine->existence}}">
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="sel1">Presentacion:</label>
                            <select class="form-control" name="presentation" id="presentation">
                                @foreach($presentations as $presentation)
                                    <option {{ ( $medicine->presentation_id == $presentation->id ) ? 'selected' : '' }}  value="{{ $presentation->id }} "> {{ $presentation->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="sel1">Uso:</label>
                            <select class="form-control" name="purpose" id="purpose">
                                @foreach($purposes as $purpose)
                                    <option {{ ( $medicine->purpose_id == $purpose->id ) ? 'selected' : '' }} value="{{ $purpose->id }} "> {{ $purpose->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>



                <div class="row">
                    <div class="col-xs-5 col-sm-5 col-md-5">
                        <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o fa-fw"></i> Guardar</button>
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

        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title"><strong>Eliminar Trabajador</strong></h3>
                    </div>
                    <div class="modal-body">
                        <h4>Estas a punto de eliminar la medicina <strong>{{$medicine->name}}</strong>. Esta accion no podra revertirse,
                            ¿Estas seguro?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>


                        <form method="POST" class="col-xs-4 col-sm-4 col-md-4 pull-right" action="{{route('admin.medicines.destroy',$medicine->id)}}">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="DELETE" />
                            <button type="submit" class="btn btn-danger">Estoy seguro, eliminar</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@stop
