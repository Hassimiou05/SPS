@extends('clientview')
@section('cli')
<h1 class="text-center">Modifier le Contrat</h1>
<div class="container col-6">
    <form method="POST" action="{{route('contrats.update', $contrat->id)}}">
        @method('PUT')
        @csrf
        <div class="row g-3">
            <div class="col">
                <label for="nbre_agents">Nombre d'agent</label>
                <input type="number" class="form-control" name="nbre_agents" value="{{$contrat->nbre_agents}}">
            </div>
            <div class="col">
                <label for="date_debut">Date de début</label>
                <input type="date" class="form-control" name="date_debut" value="{{$contrat->date_debut}}">
            </div>
        </div>
        <div class="form-group">
            <label for="client_id">Id du client</label>
            <input type="text" class="form-control" name="client_id" value="{{$contrat->client_id}}" />
        </div>
        <select class="form-select" aria-label="Default select example" name="status">
            <option selected>Status</option>
            <option value=" En cours">En cours</option>
            <option value="Résilié">Résilié</option>

        </select>
        <br>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection