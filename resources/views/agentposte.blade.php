@extends('grh')

@section('main')

<head>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

</head>
<div class="container-fluid">
    <div class="d-flex">
        <h1 class="col-6">Agents en poste</h1>
    </div>
    <div class="table-wrapper">
        <table class="table table-bordered align-middle">
            <thead class="table-dark align-middle">
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>type</th>
                    <th>date de naissance</th>
                    <th>Lieu de naissance</th>
                    <th>Lieu de résidence</th>

                    <th>N° de téléphone</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach($aposte as $agent)
                <tr>

                    <td>{{ $agent -> id }}</td>
                    <td>{{ $agent->nom }}</td>
                    <td>{{ $agent->prenom }}</td>
                    <td>{{ $agent->type }}</td>
                    <td>{{ $agent->date_naissance }}</td>
                    <td>{{ $agent->lieu_naissance }}</td>
                    <td>{{ $agent->lieu_residence }}</td>

                    <td>{{ $agent->tel }}</td>
                    <td>
                        <form method="POST" action="{{route('agents.destroy' , $agent->id)}}">
                            <div class="d-flex">
                                <a class=" btn btn-info" href="{{route('agents.show' , $agent->id)}}">Voir</a>

                                <a class="btn btn-primary ms-1" href="{{route('agents.edit' , $agent->id)}}">Modifier</a>
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