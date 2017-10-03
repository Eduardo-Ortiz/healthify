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
                    <div style="text-align: center">
                        <img src="/healthify/public/images/logo.png" alt="">
                    </div>
                    <br>
                    <div>
                         <span style="font-size: 20px;color:#000000">
                         Bienvenido a Healthify, para continuar selecciona una de las siguientes opciones:
                    </span>
                    </div>
                    <hr>
                    <div style="text-align: center">
                        <a href="{{route('register')}}" type="submit" class="btn btn-default btn-lg"><i class="fa fa-user-plus fa-fw"></i> Registro Pacientes</a>
                        &nbsp;&nbsp;&nbsp;
                        <a href="{{route('login')}}" type="submit" class="btn btn-default btn-lg"><i class="fa fa-sign-in fa-fw"></i> Ingresar al Sistema</a>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>
