@extends('grh')

@section('main')
<div class="container">
    <div class="d-flex justify-content-between bg-dark bg-gradient rounded p-2">
        <h3 class="text-light">Détails</h3>
        <form method="POST" action="{{route('agents.destroy' , $agent->id)}}">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger mt-1 "><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                </svg></button>
        </form>
    </div>
    <div class="container d-flex justify-content-between p-4">
        <div>
            <p><b>ID:</b> {{$agent->id}}</p>
            <p><b>Nom:</b> {{$agent->nom}}</p>
            <p><b>Prenom:</b> {{$agent->prenom}}</p>
            <p><b>Type:</b> {{$agent->role}}</p>
            <p><b>Date de naissance:</b> {{$agent->date_naissance}}</p>
            <p><b>Lieu de naissance:</b> {{$agent->lieu_naissance}}</p>
            <p><b>Lieu de résidence:</b> {{$agent->lieu_residence}}</p>
            <p><b>N° de téléphone:</b> {{$agent->tel}}</p>
            @if($site)
            <p class="card-text">Site: {{ $site->id }} {{ $site->ville }} {{ $site->quartier }}</p>
            @endif
        </div>
        <div>
            <img src="/image/{{$agent->image}}" width="120" height="120">
        </div>
    </div>
    <hr>
    <a class="btn btn-success" href="{{url('/agents')}}">Retour</a>

    @endsection