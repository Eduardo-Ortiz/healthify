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

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-datepicker.css') }}" />

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


<div  class="flex-center position-ref full-height" >
    <div class="panel panel-default" style="width: 600px">
        <div class="panel-body">
            <div style="text-align: center">
                <h1>Crear Cita</h1>
            </div>
            <div id="app">
            <form method="POST" action="{{route('patient.appointment')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row" style="width: 600px">

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="sel1">Especialidad:</label>
                            <select v-model="selectedSpeciality" class="form-control" v-on:change="loadDoctors()" name="especialidad" id="especialidad">
                                <option :key="0" value="-1"  disabled selected>Seleccionar Especialidad...</option>
                                <option v-for="speciality in specialities" :value="speciality.id">@{{speciality.nombre}}</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="sel1">Doctor:</label>
                            <select v-on:change="clearDoctor"  v-model="selectedDoctor" v-if="selectedSpeciality!=null" class="form-control" name="doctor" id="doctor">
                                <option v-for="doctor in doctors" :value="doctor.user_id">@{{doctor.nombre}} @{{doctor.apellido_paterno}} @{{doctor.apellido_materno}} ($@{{doctor.costo }})</option>
                            </select>
                            <div v-else>
                                <input disabled   type="text" class="form-control"  value="Seleccionar Especialidad"/>
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <label for="sel1">Fecha:</label>
                        <div v-show="selectedDoctor" class="form-group">
                            <div class="input-daterange input-group" style="width: 270px" id="datepicker">
                                <input type="text" name="date" id="date" class="form-control" />
                            </div>
                        </div>
                        <div v-show="!selectedDoctor">
                            <input disabled   type="text" class="form-control"  value="Seleccionar Doctor"/>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="sel1">Hora:</label>
                            <div v-if="!selectedDate">
                                <input disabled   type="text" class="form-control"  value="No hay horas disponibles"/>
                            </div>
                            <div v-else-if="activeHours.length==0">
                                <input disabled   type="text" class="form-control"  value="No hay horas disponibles"/>
                            </div>
                            <select v-else class="form-control" name="hour" id="hour">
                                <option v-for="hour in activeHours" :value="hour.value">@{{hour.hour}}</option>
                            </select>
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
    </div>



    <!-- jQuery -->
    <script type="text/javascript" src="{{URL::asset('js/jquery.min.js')}}"></script>

    <!-- jQuery for image preview-->
    <script type="text/javascript" src="{{URL::asset('js/image-preview.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="{{URL::asset('js/bootstrap.min.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('js/axios.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/bootstrap-datepicker.es.min.js')}}"></script>

    <!-- Vue.js -->
    <script type="text/javascript" src="{{URL::asset('js/vue.js')}}"></script>

    <script>
        var app = new Vue({
            el: '#app',
            data: {
                hours: [
                    {hour : "8:00-9:00", value : 1},
                    {hour : "9:00-10:00", value : 2},
                    {hour : "10:00-11:00", value : 3},
                    {hour : "11:00-12:00", value : 4},
                    {hour : "12:00-13:00", value : 5},
                    {hour : "15:00-16:00", value : 6},
                    {hour : "16:00-17:00", value : 7},
                    {hour : "17:00-18:00", value : 8},
                    {hour : "18:00-19:00", value : 9},
                    {hour : "19:00-20:00", value : 10}],
                activeHours : [],
                selectedSpeciality : null,
                selectedDate :null,
                specialities : null,
                doctors : null,
                selectedDoctor : null,
            },
            methods: {

                clearDoctor: function() {
                    document.getElementById("date").value=null;
                    this.selectedDate = null;
                },
                loadHours: function() {
                    axios.post('<?php echo URL::asset('ajax/appointment/hours') ?>', {
                        date: this.selectedDate,
                        doctor : this.selectedDoctor
                    })
                        .then(function (response) {

                            app.activeHours= [];
                            var usedHours = response.data;
                            console.log(usedHours);
                            for(i=0;i<app.hours.length;i++)
                            {
                                var avaiable = true;
                                for(j=0;j<usedHours.length;j++)
                                {
                                    if(app.hours[i].value==usedHours[j].hour)
                                    {
                                        avaiable=false;
                                        break;
                                    }
                                }
                                if(avaiable)
                                    app.activeHours.push({hour:app.hours[i].hour,
                                        value: app.hours[i].value})
                            }
                        })
                        .catch(function (error) {
                            this.errors.push(e)
                        });
                },
                loadDoctors: function() {
                    this.selectedDate=null;
                    this.selectedDoctor=null;
                    axios.post('<?php echo URL::asset('ajax/doctors') ?>', {
                        speciality_id: this.selectedSpeciality,
                    })
                        .then(function (response) {
                            console.log(response.data);
                            app.doctors = response.data;
                        })
                        .catch(function (error) {
                            this.errors.push(e)
                        });
                },
            },
            mounted: function(){
                $('#datepicker').datepicker({
                    format: "dd/mm/yyyy",
                    language: "es",
                    orientation: "bottom",
                    autoclose: true,

                }) .on("changeDate", function(e) {
                    app.selectedDate = document.getElementById('date').value;
                    app.loadHours();
                });

                axios.get(`<?php echo URL::asset('ajax/specialities') ?>`)
                    .then(response => {
                        // JSON responses are automatically parsed.
                        this.specialities = response.data;
                    })
                    .catch(e => {
                        this.errors.push(e)
                    });

            },

        })
    </script>
</div>


</body>
</html>
