<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />

    <!-- Styles -->
    <style>
        html, body {
            background-image: url("/healthify/public/images/background_2.jpg");
            background-repeat: repeat;

            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }



        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

<div class="flex-center position-ref full-height">


    <div class="panel panel-default">

        <div class="panel-body">
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
            <div style="text-align: center;width: 400px">
                <img style="width: 300px" src="/healthify/public/images/logo.png" alt="">
            </div>
            <br>
            <div>
                         <span style="font-size: 20px;color:#000000">
                         <div style="text-align: center">Datos Requeridos para el Registro</div>
                    </span>
            </div>
            <hr>

            <form method="POST" action="{{route('patient.register')}}" enctype="multipart/form-data">
                {{csrf_field()}}
            <div class="row" style="width: 440px">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="name">Usuario:</label>
                        <input required type="text" class="form-control" id="name" name="name"  value="{{old('name')}}">
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="name">Contraseña:</label>
                        <input required type="password" class="form-control" id="password" name="password"  value="{{old('password')}}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="name">Nombre(s):</label>
                        <input required type="text" class="form-control" id="nombre" name="nombre"  value="{{old('nombre')}}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="name">Apellido Paterno:</label>
                        <input required type="text" class="form-control" id="ap_paterno" name="ap_paterno"  value="{{old('ap_paterno')}}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="name">Apellido Materno:</label>
                        <input required type="text" class="form-control" id="ap_materno" name="ap_materno"  value="{{old('ap_materno')}}">
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="sel1">Sexo:</label>
                        <select class="form-control" id="sexo" name="sexo">
                            <option>H</option>
                            <option>M</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="name">Edad:</label>
                        <input required type="text" class="form-control" id="edad" name="edad"  value="{{old('edad')}}">
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="Foto">Foto:</label>
                        <input type="file" name="foto" accept="image/*">
                    </div>
                </div>


            </div>


            <hr>
            <div style="text-align: center">
                <button type="submit" class="btn btn-default btn-lg"><i class="fa fa-paper-plane fa-fw"></i> Enviar</button>
            </div>
            </form>

        </div>
    </div>

    <!-- jQuery -->
    <script type="text/javascript" src="{{URL::asset('js/jquery.min.js')}}"></script>

    <!-- jQuery for image preview-->
    <script type="text/javascript" src="{{URL::asset('js/image-preview.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="{{URL::asset('js/bootstrap.min.js')}}"></script>

</div>
</body>
</html>
