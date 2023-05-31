@extends('equipement.index')
@section('main')
<div class="container">
    <h3>Historique des commandes</h3>
    @foreach($commande as $commande)
    <div class="bg-success p-3">{{$commande->id}}</div>
    @endforeach
</div>
@endsection