@extends('layouts.app')

@section('content')

<div class="container-fluid ">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 border-end " style="background-color: #F7F1E5; max-height: calc(100vh - 56px); overflow-y: scroll;">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 min-vh-100">
                <h3 class="text-dark">Menu</h3>
                <hr class="">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item h6">
                        <div class="d-flex">
                            <a href="{{url('dashboard')}}" class="nav-link align-middle px-0">
                                <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                            </a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-graph-up ms-1 mt-2" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61 4.15-5.073a.5.5 0 0 1 .704-.07Z" />
                            </svg>
                        </div>
                    </li>
                    <li class="h6">
                        <div class="d-flex">
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle " class="dropdown">
                                <span class="ms-1 d-none d-sm-inline">Agents</span> </a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill ms-1 mt-2" viewBox="0 0 16 16">
                                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
                            </svg>
                        </div>
                        <ul class="collapse show nav flex-column ms-3" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100 h6">
                                <div class="d-flex">
                                    <a href="{{ url('agents') }}" class="nav-link px-0">Liste des agents </a>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-columns ms-1 mt-2" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M0 .5A.5.5 0 0 1 .5 0h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 0 .5Zm13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm-13 2A.5.5 0 0 1 .5 2h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5Zm13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm-13 2A.5.5 0 0 1 .5 4h10a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5Zm13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm-13 2A.5.5 0 0 1 .5 6h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5Zm13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm-13 2A.5.5 0 0 1 .5 8h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5Zm13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm-13 2a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5Zm13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm-13 2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5Zm13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm-13 2a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5Zm13 0a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Z" />
                                    </svg>
                                </div>

                            </li>
                            <li class="h6">
                                <a href="{{ url('aposte') }}" class="nav-link px-0"> Liste des agents en activités </a>
                            </li>

                        </ul>
                    </li>
                    <li class="h6">
                        <div class="d-flex">
                            <a href="{{url('sites')}}" class="nav-link px-0 align-middle">
                                <span class="ms-1 d-none d-sm-inline">Sites</span></a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-fill ms-1 mt-2" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z" />
                            </svg>
                        </div>
                    </li>
                    <li class="h6">
                        <div class="d-flex">
                            <a href="{{ url('fichedepaie') }}" class="nav-link px-0">
                                <span class="ms-1 d-none d-sm-inline">Fiche de Salaire</span></a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-check-fill ms-1 mt-2" viewBox="0 0 16 16">
                                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm1.354 4.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708.708z" />
                            </svg>
                        </div>
                    </li>
                    <li class="h6">
                        <div class="d-flex">
                            <a href="{{url('abscence')}}" class="nav-link px-0 align-middle">
                                <span class="ms-1 d-none d-sm-inline">Abscence</span></a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-data-fill ms-1 mt-2" viewBox="0 0 16 16">
                                <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5Z" />
                                <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585c.055.156.085.325.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5c0-.175.03-.344.085-.5ZM10 7a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7Zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1Zm4-3a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0V9a1 1 0 0 1 1-1Z" />
                            </svg>
                        </div>
                    </li>

                    <li class="h6">
                        <div class="d-flex">
                            <a href="{{url('fullcalender')}}" class="nav-link px-0 align-middle">
                                <span class="ms-1 d-none d-sm-inline">Calendrier</span></a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" fill="currentColor" class="bi bi-calendar-plus-fill ms-1 mt-2" viewBox="0 0 16 16">
                                <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zM8.5 8.5V10H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V11H6a.5.5 0 0 1 0-1h1.5V8.5a.5.5 0 0 1 1 0z" />
                            </svg>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
        <div class="col py-3" style="overflow-y: scroll;">
            @yield('main')
            @yield('scripts')
        </div>
    </div>
</div>





@endsection