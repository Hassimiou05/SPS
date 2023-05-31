@extends('equipement.index')
@section('main')
<div class="container">
    <div class="d-flex justify-content-between bg-dark bg-gradient text-light rounded mt-2 p-3">
        <h3>Gestion des équipements</h3>
        <div class="d-flex">
            <button class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#exampleModal">+</button>
            <!-- Modal Ajout équipement -->
            <div class="modal text-dark" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajouter un équipement</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="{{route('storage')}}">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Type d'équipements</label>
                                    <select class="form-select" aria-label="Default select example" name="type_id">
                                        <option selected>Choisissez le type d'équipement</option>
                                        @foreach($type as $type)
                                        <option value="{{$type->id}}">{{$type->nom}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Modèle</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Echantillon" name="modele">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Fournisseur</label>
                                    <select class="form-select" aria-label="Default select example" name="fournisseur_id">
                                        <option selected>Sélectionnez le fournisseur</option>
                                        @foreach($fournisseur as $fournisseur)
                                        <option value="{{$fournisseur->id}}">{{$fournisseur->nom}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Quantité</label>
                                    <input type="number" class="form-control" id="exampleFormControlInput1" name="quantite">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Param
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li>
                        <a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#Ajouttype">
                            Ajouter un type
                        </a>
                    </li>
                    <li><a class="dropdown-item" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">Voir les types d'équipements</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
        </div>
        <!-- Modal Ajouter type d'équipement -->
        <div class="modal" id="Ajouttype" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content text-dark">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajouter un type d'équipement</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('equipement.store')}}">
                        <div class="modal-body">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nom de l'équipent</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="nom" placeholder="Uniforme">
                            </div>

                        </div>

                        <div class=" modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Offcanvas -->
        <div class="offcanvas offcanvas-end text-dark" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Liste des types d'équipement</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div>
                    @foreach($typenom as $typenom)
                    <div class="">
                        <h3>{{$typenom}}</h3>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="table-wrapper">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Modèle</th>
                    <th>Fournisseur</th>
                    <th>Description</th>
                    <th>Quantité</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach($equipement as $equipement)
                <tr>

                    <td>{{ $equipement ->type_id }}</td>
                    <td>{{ $equipement -> modele }}</td>
                    <td>{{ $equipement -> fournisseur_id }}</td>
                    <td>{{ $equipement -> description }}</td>
                    <td>{{ $equipement -> quantite }}</td>
                    <td>
                        <div class="d-flex">
                            <a class=" btn btn-info" href="">Voir</a>

                            <a class="btn btn-primary ms-1" href="">Modifier</a>
                        </div>
                    </td>


                </tr>
                @endforeach

            </tbody>
        </table>

    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true
        });
    });
</script>
@endsection