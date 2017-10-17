@extends('layouts.admin.panel')


@section('content')


    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><strong>Panel de Control</strong></h1>
        </div>
    </div>

    <!-- /.row -->
    <div class="row">
        <div class="col-lg-4 col-md-4">
            <div class="panel panel-purple">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-calendar-check-o fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div style="font-size: 20px">

                                @if(count($maxHour))
                                    {{$maxHour[0]->hour}}

                                @else
                                    N/A
                                @endif


                            </div>
                            <div>Horario en que mas citas hay</div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <span class="pull-left">
                        @if(count($maxHour))
                            Con <strong>{{$maxHour[0]->quantity}}</strong> Citas en Total
                        @else

                        @endif
                    </span>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>



        <div class="col-lg-4 col-md-4">
            <div class="panel panel-purple">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users  fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div style="font-size: 20px">
                                @if(count($topDoctor))
                                    {{App\Doctor::where('user_id','=',$topDoctor[0]->doctor)->first()->getFullName()}}
                                @else
                                    N/A
                                @endif
                            </div>
                            <div>Doctor con mas pacientes</div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <span class="pull-left">
                        @if(count($topDoctor))
                            Con un total de <strong>{{$topDoctor[0]->quantity}}</strong> Citas
                        @else

                        @endif
                    </span>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>




        <div class="col-lg-4 col-md-4">
            <div class="panel panel-purple">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-money fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div style="font-size: 20px">
                                ${{$mensualIncome}}
                            </div>
                            <div>Ingresos durante este mes</div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <span class="pull-left">
                          Con <strong>{{$totalAppointments}}</strong> Citas completadas en total
                    </span>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>



        <div class="col-lg-4 col-md-4">
            <div class="panel panel-purple">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user-md fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div style="font-size: 25px">
                                {{$totalDoctors}}
                            </div>
                            <div>Doctores Registrados</div>
                        </div>
                    </div>
                </div>
                <a style="color: black" href="{{url('admin/doctors')}}">
                    <div class="panel-footer">
                    <span class="pull-left">
                            Ver Lista de Doctores
                    </span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>

            </div>
        </div>






        <div class="col-lg-4 col-md-4">
            <div class="panel panel-purple">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-venus-mars fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div style="font-size: 25px">

                                {{($highestSex[0]->sexo=="H" ? "Hombres" : "Mujeres")}}

                            </div>
                            <div>Pacientes mas atendidos</div>
                        </div>
                    </div>
                </div>

                    <div class="panel-footer">
                    <span class="pull-left">
                        Con <strong>{{$highestSex[0]->quantity}}</strong> pacientes  {{($highestSex[0]->sexo=="H" ? "hombres" : "mujeres")}}
                    </span>
                        <div class="clearfix"></div>
                    </div>


            </div>
        </div>





        <div class="col-lg-4 col-md-4">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div style="font-size: 25px">

                                @if(count($bottomDoctor))
                                    {{App\Doctor::where('user_id','=',$bottomDoctor[0]->user_id)->first()->getFullName()}}
                                @else
                                    N/A
                                @endif

                            </div>
                            <div>Medico con menos pacientes</div>
                        </div>
                    </div>
                </div>

                <div class="panel-footer">
                    <span class="pull-left">
                        @if(count($bottomDoctor))
                            Con un total de <strong>{{$bottomDoctor[0]->quantity}}</strong> Citas
                        @else

                        @endif
                    </span>
                    <div class="clearfix"></div>
                </div>


            </div>
        </div>






        <div class="col-lg-4 col-md-4">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-toggle-off fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div style="font-size: 20px">

                                @if(count($lessMedicine))
                                    {{$lessMedicine[0]->name}}
                                @else
                                    N/A
                                @endif

                            </div>
                            <div>Medicina menos recetada</div>
                        </div>
                    </div>
                </div>

                <div class="panel-footer">
                    <span class="pull-left">
                        @if(count($lessMedicine))
                            Recetada solo <strong>{{$lessMedicine[0]->quantity}}</strong> Veces
                        @else

                        @endif
                    </span>
                    <div class="clearfix"></div>
                </div>


            </div>
        </div>








        <div class="col-lg-4 col-md-4">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-exclamation-circle fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div style="font-size: 20px">

                                @if(count($lowExistence))
                                    {{$lowExistence[0]->name}}

                                @else
                                    N/A
                                @endif

                            </div>
                            <div>Medicina menos existencia</div>
                        </div>
                    </div>
                </div>

                <div class="panel-footer">
                    <span class="pull-left">
                        @if(count($lowExistence))
                            Con un total de <strong>{{$lowExistence[0]->existence}}</strong> Unidades
                        @else

                        @endif
                    </span>
                    <div class="clearfix"></div>
                </div>


            </div>
        </div>

    </div>
@stop
