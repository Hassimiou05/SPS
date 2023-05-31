@extends('clientview')

@section('cli')
<div class="container-fluid">
    <a type="button" href="{{ url('clients/create') }}" class="btn btn-primary">Ajouter un client</a>
    <h1>Liste des clients</h1>
    <div class="table-wrapper">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>N° de téléphone</th>
                    <th>Lieu de résidence</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                <tr>

                    <td>{{ $client -> client_id }}</td>
                    <td>{{ $client -> nom }}</td>
                    <td>{{ $client -> prenom }}</td>
                    <td>{{ $client -> tel }}</td>
                    <td>{{ $client -> lieu_residence }}</td>
                    <td>
                        <div class="d-flex">
                            <a class=" btn btn-info" href="{{route('clients.show' , $client->client_id)}}">Voir</a>

                            <a class="btn btn-primary ms-1" href="{{route('clients.edit' , $client->client_id)}}">Modifier</a>
                        </div>
                    </td>

                </tr>
                @endforeach

            </tbody>
        </table>
        <div class="d-flex justify-content-center container">
            {{ $clients->links() }}
        </div>
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