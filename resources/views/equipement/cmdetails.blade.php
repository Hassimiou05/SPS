@extends('equipement.index')
@section('main')
<div class="container">
    <div class="d-flex justify-content-between bg-dark bg-gradient text-light rounded mt-2 p-3">
        <h3>Détails de la commande N°{{$commande->id}}</h3>
        <div class="d-flex">
            <!-- Button trigger modal -->
            @if($hasEquipments)
            <button type="button" class="btn btn-warning me-2" disabled data-bs-toggle="modal" data-bs-target="#exampleModal">
                Commande prévalidé
            </button>
            @else
            <button type="button" class="btn btn-warning me-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Valider la précommande
            </button>
            @endif
            <!-- Modal -->
            <div class="modal text-dark" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirmer la commande</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="{{route('validecommande')}}">
                            @csrf
                            <input type="hidden" class="form-control" id="exampleFormControlInput1" value="{{$commande->id}}" name="commande_id">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">choisir l'équipement</label>
                                    <select class="form-select" aria-label="Default select example" name="equipment_id">
                                        <option selected>Choisir l'équipement à commander</option>
                                        @foreach($equipement as $equipement)
                                        <option value="{{$equipement->id}}">{{$equipement->description}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Quantité</label>
                                    <input type="number" class="form-control" name="quantite">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Valider</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @if($commande->livrer == 1)
            <form method="POST" action="{{ route('commande.incrementer', $commande->id) }}">
                @csrf
                <button type="submit" class="btn btn-success" disabled>Cmmande livré</button>
            </form>
            @else
            <form method="POST" action="{{ route('commande.incrementer', $commande->id) }}">
                @csrf
                <button type="submit" class="btn btn-success">Confirmer la livraison</button>
            </form>
            @endif

        </div>
    </div>
    <div class="container p-3">
        <h4>Date de la commande: {{$commande->date_commande}}</h4>
        <h4>Nom et prénom du fournisseur: {{$commande->nom_fournisseur}}</h4>
        <h4>livraison: {{$commande->livrer}}</h4>
        <h4>Quantité:{{$quantiteTotale}}</h4>
    </div>
</div>
@endsection