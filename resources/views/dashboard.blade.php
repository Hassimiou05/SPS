@extends('grh')

@section('main')
<div class="container-fluid">
    <div class="d-flex justify-content-between container bg-dark bg-gradient p-3 mb-5">
        <h3 class="text-light">Tableau de bord</h3>
    </div>
    <div class="d-flex justify-content-between container">
        <div class="d-flex col justify-content-between text-center row row-cols">

            <div class="col shadow p-3 mb-5 bg-body rounded d-flex justify-content-around">
                <div class="col-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
                    </svg>
                </div>
                <div class="col">
                    <h4>Agents</h4>
                    <h3>{{$nba}}</h3>
                </div>
            </div>

            <div class="col shadow p-3 mb-5 bg-body rounded d-flex justify-content-around">
                <div class="col-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-house-lock-fill" viewBox="0 0 16 16">
                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                        <path d="m8 3.293 4.72 4.72a3 3 0 0 0-2.709 3.248A2 2 0 0 0 9 13v2H3.5A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
                        <path d="M13 9a2 2 0 0 0-2 2v1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1v-1a2 2 0 0 0-2-2Zm0 1a1 1 0 0 1 1 1v1h-2v-1a1 1 0 0 1 1-1Z" />
                    </svg>
                </div>
                <div class="col">
                    <h4>Sites</h4>
                    <h3>{{$nbs}}</h3>
                </div>
            </div>


        </div>
        <!--EVENEMENT DU JOUR-->
        <div class="card" style="width: 23rem;">
            <div class="card-header">
                Evenements du jour
            </div>
            <ul class="list-group list-group-flush">
                @foreach($evenement as $evenement)
                <li class="list-group-item">{{$evenement->title}}</li>
                @endforeach
            </ul>
        </div>
    </div>

</div>
@endsection