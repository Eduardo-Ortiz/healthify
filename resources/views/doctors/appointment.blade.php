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
                <li><a href="#"><strong>Doctor: {{ Auth::user()->name }}</strong></a></li>
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

    <div class="panel panel-default" style="width: 800px">
        <div class="panel-body">
            <div style="text-align: center">
                <h1>Cita #{{$appointment->id}}</h1>
            </div>

            <hr>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12" style="font-size: 18px;text-align: left">
                    Paciente: <strong>{{$appointment->patient->patient->nombre}} {{$appointment->patient->patient->apellido_paterno}} {{$appointment->patient->patient->apellido_materno}}</strong>
                        Expediente: <strong> {{$appointment->patient->patient->id}}</strong>
                </div>
            </div>
            <hr>

            <h4>Datos Generales</h4>
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label for="name">Peso:</label>
                        <input required type="text" class="form-control" id="nombre" name="nombre"  value="{{old('nombre')}}">
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label for="name">Altura:</label>
                        <input required type="text" class="form-control" id="nombre" name="nombre"  value="{{old('nombre')}}">
                    </div>
                </div>
            </div>
            <h4>Medicamentos</h4>
            <div id="app" class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="well" style="text-align: center;">
                        <input v-on:keyup="search" v-model="searchMedicine" placeholder="Buscar Medicamento..."  type="text" class="form-control" id="searchMedicine" name="searchMedicine">
                        <br>
                        <div v-if="searchResults.length==0">
                            <input disabled type="text" class="form-control"  value="Sin resultados"/>
                        </div>

                        <select v-model="selectedMedicine" v-else class="form-control" name="medicine" id="medicine">
                            <option v-for="medicine in searchResults" :value="medicine.id">@{{medicine.name}} (@{{medicine.presentation_name}})</option>
                        </select>
                        <br>
                        <div class="row">
                            <div class="col-xs-2 col-sm-2 col-md-2">
                                <input v-model="quantity" type="number" class="form-control" placeholder="Cantidad.."/>
                            </div>

                            <div class="col-xs-10 col-sm-10 col-md-10">
                                <input v-model="observations" type="text" class="form-control" placeholder="Observaciones.."/>
                            </div>
                        </div>
                        <br>
                        <div style="text-align: center">
                            <button v-on:click="addMedicine()" type="submit" class="btn btn-default btn-sm"><i class="fa fa-plus-circle fa-fw"></i> Agregar</button>
                        </div>

                    </div>


                </div>

                <div>
                    <br>

                    <div class="row">
                        <div class="col-xs-10 col-sm-10 col-md-10 col-md-offset-1">
                            <div v-for="part in recipe">
                                <div class="well">part.</div>
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
                                <h3 class="modal-title"><strong>Error</strong></h3>
                            </div>
                            <div class="modal-body">
                                <h4>No hay suficiente existencia de la medicina seleccionada.</h4>
                            </div>
                            <div class="modal-footer">
                                <button v-on:click="loadAlternatives" type="button" class="btn btn-success" data-dismiss="modal">Cargar Alternativas</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>

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
                searchMedicine : null,
                searchResults : [],
                selectedMedicine: null,
                recipe: [],
                observations: null,
                quantity: null,
                alternativeResults : [],
                selectedAlternative : null,
                medicineType : null
            },
            methods: {
                search : function() {
                    this.searchResults = [];
                    axios.post('<?php echo URL::asset('ajax/medicines') ?>', {
                        input: this.searchMedicine,
                    })
                        .then(function (response) {
                            app.searchResults = response.data;
                        })
                        .catch(function (error) {
                            this.errors.push(e)
                        });
                },
                loadAlternatives : function() {

                },
                addMedicine : function() {

                    if(this.selectedMedicine!=null&&this.quantity>0&&this.observations!=null)
                    {

                        axios.post('<?php echo URL::asset('ajax/medicinesdata') ?>', {
                            medicine: this.selectedMedicine,
                        })
                            .then(function (response) {
                                console.log(app.quantity+"|||"+response.data.existence);
                                if(app.quantity>response.data.existence)
                                {
                                    app.medicineType = response.data.purpose_name;
                                    $("#myModal").modal();
                                }
                                else
                                {
                                    app.recipe.push(
                                        {
                                            medicine : response.data.id,
                                            quantity : app.quantity,
                                            observations : app.observations,
                                            presentation : response.data.presentation_name

                                        }
                                    );
                                    app.$forceUpdate();
                                }
                                console.log(response.data);
                            })
                            .catch(function (error) {
                                this.errors.push(e)
                            });






                    }
                }


            },
        })
    </script>

</div>
</body>
</html>
