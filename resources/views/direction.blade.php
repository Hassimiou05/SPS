@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 border-end ">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 min-vh-100">
                <h3 class="text-dark">Menu</h3>
                <hr class="">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="{{url('dashboard')}}" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                            <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Clients ></span></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="{{ url('clients') }}" class="nav-link px-0"> <span class="d-none d-sm-inline">Liste des clients</span> 1</a>
                            </li>
                            <li>
                                <a href="{{ url('contrats') }}" class="nav-link px-0"> <span class="d-none d-sm-inline">Contrats</span> 2</a>
                            </li>
                        </ul>
                    </li>


                </ul>

            </div>
        </div>
        <div class="col py-3">
            @yield('dir')
        </div>
    </div>
</div>





@endsection