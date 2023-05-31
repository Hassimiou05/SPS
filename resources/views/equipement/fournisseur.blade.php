@extends('equipement.index')
@section('main')
<div class="container">
    <div class="d-flex justify-content-between bg-dark bg-gradient text-light rounded mt-2 p-3">
        <h3>Gestion des Fournisseurs</h3>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Ajouter un fournisseur
        </button>
        <!-- Modal -->
        <div class="modal text-dark" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajouter un fournisseur</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{route('fournisseur.store')}}">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom & Prénom</label>
                                <input type="text" class="form-control" id="nom" placeholder="Hassimiou Gueye" name="nom">
                            </div>
                            <div class="mb-3">
                                <label for="adresse" class="form-label">Adresse</label>
                                <input type="text" class="form-control" id="adresse" placeholder="Kaloum" name="adresse">
                            </div>
                            <div class="mb-3">
                                <label for="tel" class="form-label">Contact</label>
                                <input type="tel" class="form-control" id="tel" placeholder="00224654342132" name="telephone">
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
    </div>
    <div class="table-wrapper mt-3">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Contact</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($fournisseurs as $fournisseur)
                <tr>
                    <td>{{ $fournisseur->id }}</td>
                    <td>{{ $fournisseur->nom }}</td>
                    <td>{{ $fournisseur ->adresse }}</td>
                    <td>{{ $fournisseur -> telephone }}</td>
                    <td>
                        <div class="d-flex">
                            <a class=" btn btn-info" href="{{route('fournisseur.show' , $fournisseur->id)}}">Voir</a>

                            <a class="btn btn-primary ms-1" href="{{route('fournisseur.edit' , $fournisseur->id)}}">Modifier</a>
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