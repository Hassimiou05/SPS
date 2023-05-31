@extends('grh')
@section('main')
<div class="container">
    <h3>Ajouter une fiche de paie</h3>
    <form method="POST" action="{{route('fichedepaie.store')}}">
        @csrf
        <div class="col">
            <label>Fiche d'abscence</label>
            <select class="form-select" name="abscence_id">
                @foreach($abscence as $abscence)
                <option value="{{$abscence->id}}">{{$abscence->id}} {{$abscence->periode}}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <label for="datedebut">Période de debut</label>
            <input type="date" class="form-control" name="datedebut">
        </div>
        <div class="col">
            <label for="datefin">Période de fin</label>
            <input type="date" class="form-control" name="datefin">
        </div>
        <button type="submit" class="btn btn-primary mt-2">Sauvegarder</button>
    </form>
</div>
@endsection