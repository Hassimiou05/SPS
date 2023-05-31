@extends('clientview')

@section('cli')
<div class="container-fluid">
    <a type="button" href="{{ url('contrats/create') }}" class="btn btn-primary">Ajouter un contrat</a>
    <h1>Tous les Contrats</h1>
    <div class="table-wrapper">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre d'agent</th>
                    <th>Date de debut</th>
                    <th>Status</th>
                    <th>client</th>

                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach($contrat as $contrat)
                <tr>

                    <td>{{ $contrat -> id }}</td>
                    <td>{{ $contrat -> nbre_agents }}</td>
                    <td>{{ $contrat -> date_debut }}</td>
                    <td>{{ $contrat -> status }}</td>
                    <td>{{ $contrat -> client_id }}</td>


                    <td>
                        <form method="POST" action="{{route('contrats.destroy' , $contrat->id)}}">
                            <div class="d-flex">
                                <a class=" btn btn-info" href="{{route('contrats.show' , $contrat->id)}}">Voir</a>

                                <a class="btn btn-primary ms-1" href="{{route('contrats.edit' , $contrat->id)}}">Modifier</a>
                            </div>

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger mt-1 ">Supprimer</button>
                        </form>
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