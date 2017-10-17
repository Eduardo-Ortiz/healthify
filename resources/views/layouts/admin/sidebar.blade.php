<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu" style="margin-top: 15px">
            <li>
                <a href="{{url('admin')}}"><i class="fa fa-dashboard fa-fw"></i> Principal</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-user-md fa-fw"></i> Doctores<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('admin/doctors')}}">Explorar</a>
                    </li>
                    <li>
                        <a href="{{url('admin/doctors/create')}}">Registrar</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-user fa-fw"></i> Pacientes<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('admin/patients')}}">Explorar</a>
                    </li>
                    <li>
                        <a href="{{url('admin/patients/less')}}">Con Menos Consultas</a>
                    </li>
                    <li style="display: none">
                        <a href="{{url('admin/admins/create')}}">Registrar</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li style="display: none">
                <a href="#"><i class="fa fa-calendar-o fa-fw"></i> Citas<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('admin/admins')}}">Explorar</a>
                    </li>
                    <li>
                        <a href="{{url('admin/admins/create')}}">Crear</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-toggle-off fa-fw"></i> Medicamentos<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('admin/medicines')}}">Explorar</a>
                    </li>
                    <li>
                        <a href="{{url('admin/medicines/create')}}">Registrar</a>
                    </li>
                    <li>
                        <a href="{{url('admin/medicines/purposes')}}">Usos</a>
                    </li>
                    <li>
                        <a href="{{url('admin/medicines/presentations')}}">Presentaciones</a>
                    </li>
                    <li>
                        <a href="{{url('admin/medicines/registry')}}">Registro</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>




        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>