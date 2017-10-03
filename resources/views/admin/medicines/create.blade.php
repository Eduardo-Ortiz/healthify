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

            <form method="POST" action="{{route('admin.medicines.store')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <!-- Name Input -->
                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input required type="text" class="form-control" id="name" name="name"  value="{{old('name')}}">
                        </div>
                    </div>
                    <!-- Name Input -->
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <label for="password">Existencia:</label>
                        <div class="input-group">
                            <span class="input-group-addon transparent"><strong>#</strong> </span>
                            <input required type="number" class="form-control" id="existence" name="existence" >
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="sel1">Presentacion:</label>
                            <select class="form-control" name="presentation" id="presentation">
                                @foreach($presentations as $presentation)
                                    <option value="{{ $presentation->id }} "> {{ $presentation->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="sel1">Uso:</label>
                            <select class="form-control" name="purpose" id="purpose">
                                @foreach($purposes as $purpose)
                                    <option value="{{ $purpose->id }} "> {{ $purpose->name }} </option>
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


        </div>
    </div>

@stop

