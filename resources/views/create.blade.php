@extends('layouts.app')
@section('content')
<h1 class="text-center">Ajouter un agent</h1>
<div class="container col-6">
    <form method="POST" action="{{ route('agents.store')}}" enctype="multipart/form-data">

        @csrf

        <div class="col">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" name="nom">
        </div>
        <div class="col">
            <label for="nom">Prenom</label>
            <input type="text" class="form-control" name="prenom">
        </div>

        <label for="role">Rôle</label>
        <select class="form-select" name="role">
            <option value="Agents">Agents</option>
            <option value="Controlleur">Controlleur</option>
            <option value="Superviseur">Superviseur</option>
        </select>
        <div class="form-group col">
            <label for="date_naissance">Date de naissance</label>
            <input type="date" class="form-control" name="date_naissance" />
        </div>

        <div class="form-group">
            <label for="lieu_naissance">Lieu de naissance</label>
            <input type="text" class="form-control" name="lieu_naissance" />
        </div>
        <div class="form-group">
            <label for="lieu_residence">Lieu de résidence</label>
            <input type="text" class="form-control" name="lieu_residence" />
        </div>
        <div class="form-group">
            <label for="tel">Numero de téléphone</label>
            <input type="phone" class="form-control" name="tel" />
        </div>
        <label for="poste">Status du poste</label>
        <select class="form-select" name="poste">
            <option value="attente">En attente</option>
            <option value="poste">Posté</option>
        </select>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" name="image" />
        </div><br>
        <button type="submit" class="btn btn-primary">Sauvegarder</button>
    </form>
</div>
@endsection