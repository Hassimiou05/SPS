@extends('equipement.index')
@section('main')
<div class="container">
    <div class="d-flex justify-content-between bg-dark bg-gradient text-light rounded mt-2 p-3">
        <h3>Détails du fournisseur</h3>
        <div class="d-flex">
            <button class="btn btn-sm btn-primary me-2">Param</button>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="commande" data-bs-toggle="dropdown" aria-expanded="false">
                    Commande
                </button>
                <ul class="dropdown-menu" aria-labelledby="commande">
                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">Nouvelle Commande</a></li>
                    <li><a class="dropdown-item" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" href="#">Voir l'historique</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
                <!-- Modal Nouvelle Commande -->
                <div class="modal text-dark" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Créer une nouvelle commande</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{route('commande.store', $fournisseur->id)}}">
                                @csrf
                                <div class="modal-body">
                                    <input type="hidden" name="fournisseur_id" value="{{$fournisseur->id}}">
                                    <div class="mb-3">
                                        <label for="date_commande" class="form-label">Date de la commande</label>
                                        <input type="date" class="form-control" id="date_commande" name="date_commande">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Offcanvas Historique Commande -->
                <div class="offcanvas text-dark offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header">
                        <h5 id="offcanvasRightLabel">Historique des commandes</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        @foreach($commande as $commande)
                        <div class="text-dark border p-2">
                            <h6>Commande N°{{$commande->id}}</h6>
                            <h6>Date de la commande: {{$commande->date_commande}}</h6>
                            <h6>Date de la livraison: {{$commande->date_livraison}}</h6>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="p-3 mt-2">
        <h4>Nom & Prenom : {{$fournisseur->nom}}</h4><br>
        <h4>Adresse : {{$fournisseur->adresse}}</h4><br>
        <h4>Contact : {{$fournisseur->telephone}}</h4>
    </div>

</div>
@endsection