@extends('grh')
@section('main')
<div class="container">
    <h3>Fiche de paie</h3>
    <div class="mb-2">
        <a class="btn btn-primary" href="{{route('fichedepaie.create')}}">Ajouter une fiche de paie</a>
    </div>
    <div class="container">
        @foreach($fdp as $fiche)
        <div class="card">
            <div class="card-body d-flex justify-content-between bg-dark text-light">
                <h6 class="col-8">Période du <span>{{$fiche->datedebut}}</span> au <span>{{$fiche->datefin}}</span> </h6>
                <a href="{{route('fichedepaie.show', $fiche->id)}}" class="">Voir</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection