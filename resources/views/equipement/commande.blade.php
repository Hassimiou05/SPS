@extends('equipement.index')
@section('main')
<div class="container">
    <h3>Liste des commandes en cours</h3>
    @foreach($commande as $commande)
    <div class="p-2 rounded bg-secondary bg-gradient text-light d-flex justify-content-between">
        <div>
            <h3>Commande N°{{$commande->id}}</h3>
            <h6>Date de la commande: {{$commande->date_commande}}</h6>
        </div>
        @if($hasEquipments)
        <svg width="10" height="10" class="mt-2 col-8">
            <circle cx="5" cy="5" r="5" fill="#F0A500" /><!-- orange -->
        </svg>
        @else
        <svg width="10" height="10" class="mt-2 col-8">
            <circle cx="5" cy="5" r="5" fill="#DF2E38" /><!-- rouge -->
        </svg>
        @endif
        <div>
            <a class="btn btn-primary mt-2" href="{{route('commande.show', $commande->id)}}">Détails</a>
        </div>
    </div>
    @endforeach
</div>
@endsection