@extends('grh')

@section('main')

<body>
    <div class="container-fluid">
        <h1 class="">Tous les agents</h1>
        <div class="d-flex mb-3 bg-secondary bg-gradient p-3 rounded justify-content-between">
            <div class="">
                <a type="button" href="{{ url('agents/create') }}" class="btn btn-primary">Ajouter un agent</a>
            </div>
            <div class="">
                <a type="button" class="btn btn-outline-info" href="{{ url('/pdf') }}">Exporter</a>
            </div>

        </div>
        <div class="table-wrapper">
            <table class="table table-bordered align-middle table-sm" id="myTable">
                <thead class="table-dark align-middle">
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Rôle</th>
                        <th>Lieu de résidence</th>
                        <th>N° de téléphone</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($agents as $agent)
                    <tr>

                        <td>{{ $agent -> id }}</td>
                        <td>{{ $agent->nom }}</td>
                        <td>{{ $agent->prenom }}</td>
                        <td>{{ $agent->role }}</td>
                        <td>{{ $agent->lieu_residence }}</td>

                        <td>{{ $agent->tel }}</td>
                        <td>
                            <div class="d-flex">
                                <a class=" btn btn-info" href="{{route('agents.show' , $agent->id)}}">Voir</a>

                                <a class="btn btn-primary ms-1" href="{{route('agents.edit' , $agent->id)}}">Modifier</a>
                            </div>

                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>


    </div>
</body>




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