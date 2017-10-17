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
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('patient')}}">  <img style="width: 110px" src="/healthify/public/images/logo.png" alt=""></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('patient') }}">Inicio</a></li>
                <li><a href="#"><strong>Paciente: {{ Auth::user()->name }}</strong></a></li>
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Cerrar Sesión
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>


<div class="flex-center position-ref full-height" >

    <div class="panel panel-default" style="width: 800px;margin-top: 100px">
        <div class="panel-body">
            <div style="text-align: center">
                <h1>Recetas</h1>
            </div>

            <hr>

            @if(count($appointments))
                @foreach($appointments as $appointment)
                    <li class="list-group-item">
                        <strong>Fecha : </strong>{{$appointment->appointment_date}}    <strong> Cita : </strong>{{$appointment->id}}  <br>
                        <hr>
                        <table style="text-align: left" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Medicamento</th>
                                <th>Cantidad</th>
                                <th>Observaciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($appointment->recipes as $recipe)
                                <tr>
                                    <td>{{$recipe->medicine->name}}</td>
                                    <td>{{$recipe->quantity}}</td>
                                    <td>{{$recipe->observations}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                    </li>


                @endforeach
            @else
                <h4>No hay recetas disponibles</h4>
            @endif




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
