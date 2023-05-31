@extends('grh')
@section('main')
<h1 class="text-center">Ajouter un Site</h1>
<div class="container col-6">
    <form method="POST" action="{{ route('sites.store')}}">

        @csrf
        <div class="row g-3">
            <label for="contrat_id">Numéro du contrat</label>
            <select class="form-select" aria-label="Default select example" name="contrat_id">
                @foreach($contrats as $contrat)
                <option value="{{$contrat->id}}">{{$contrat->id}}</option>
                @endforeach
            </select>
            <div class="col">
                <label for="ville">Ville</label>
                <input type="text" class="form-control" name="ville">
            </div>
        </div>
        <div class="form-group">
            <label for="quartier">Quartier</label>
            <input type="text" class="form-control" name="quartier" />
        </div>
        <div class="form-group">
            <label for="flotte">Flotte</label>
            <input type="tel" class="form-control" name="flotte" />
        </div>


        <button type="submit" class="btn btn-primary mt-2">Ajouter</button>
    </form>
</div>
@endsection