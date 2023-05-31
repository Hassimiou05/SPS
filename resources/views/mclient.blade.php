@extends('grh')
@section('main')
<h1 class="text-center">Ajouter un client</h1>
<div class="container col-6">
    <form method="POST" action="{{ route('clients.update', $client->client_id)}}">
        @method('PUT')
        @csrf
        <div class="row g-3">
            <div class="col">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom" value="{{ $client->nom }}">
            </div>
            <div class="col">
                <label for="nom">Prenom</label>
                <input type="text" class="form-control" name="prenom" value="{{ $client->prenom }}">
            </div>
        </div>
        <div class="form-group">
            <label for="tel">Numero de téléphone</label>
            <input type="phone" class="form-control" name="tel" value="{{ $client->tel }}" />
        </div>
        <div class="form-group">
            <label for="lieu_residence">Lieu de résidence</label>
            <input type="text" class="form-control" name="lieu_residence" value="{{ $client->lieu_residence }}" />
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection