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
            <a class="navbar-brand" href="#">  <img style="width: 110px" src="/healthify/public/images/logo.png" alt=""></a>
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

    <div class="panel panel-default" style="width: 800px">
        <div class="panel-body" style="text-align: center">
            <h1>Historial de Peso y Altura</h1>
            <hr>
            @if(count($appointments))
                <table style="text-align: left" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Peso</th>
                        <th>Altura</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($appointments as $appointment)
                        <tr>
                            <td>{{$appointment->appointment_date}}</td>
                            <td>{{$appointment->weight}} kg</td>
                            <td>{{$appointment->height}} mts</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h4>No hay citas programadas</h4>
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
