@extends('clientview')
@section('cli')
<h1 class="text-center">Ajouter un Contrat</h1>
<div class="container col-6">
    <form method="POST" action="{{route('contrats.store')}}">
        @csrf
        <div class="row g-3">
            <div class="col">
                <label for="nbre_agents">Nombre d'agent</label>
                <input type="number" class="form-control" name="nbre_agents">
            </div>
            <div class="col">
                <label for="date_debut">Date de début</label>
                <input type="date" class="form-control" name="date_debut">
            </div>
        </div>
        <label>Clients</label>
        <select class="form-select" aria-label="Default select example" name="client_id">
            @foreach($clients as $clients)
            <option value="{{$clients->client_id}}">{{$clients->client_id}}-{{$clients->nom}} {{$clients->prenom}}</option>
            @endforeach
        </select><br>
        <select class="form-select" aria-label="Default select example" name="status">
            <option selected>Status</option>
            <option value="En cours">En cours</option>
            <option value="Résilié">Résilié</option>

        </select>
        <br>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection