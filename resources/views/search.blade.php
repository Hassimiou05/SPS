@extends('grh')
@section('main')
<div class="container">
    <div class="">
        <div class="d-flex justify-content-between">
            <div class="col-6">
                <h3>Votre recherche</h3>
            </div>
            <div>
                <a class="btn btn-warning" href="{{url('/agents')}}">Revenir</a>
            </div>
        </div>
        <hr>
        <div class="table-wrapper">
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>type</th>
                        <th>date de naissance</th>
                        <th>Lieu de naissance</th>
                        <th>Lieu de résidence</th>
                        <th>Image</th>
                        <th>N° de téléphone</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($agent as $agent)
                    <tr>

                        <td>{{ $agent -> id }}</td>
                        <td>{{ $agent->nom }}</td>
                        <td>{{ $agent->prenom }}</td>
                        <td>{{ $agent->type }}</td>
                        <td>{{ $agent->date_naissance }}</td>
                        <td>{{ $agent->lieu_naissance }}</td>
                        <td>{{ $agent->lieu_residence }}</td>
                        <td><img class="rounded" src="/image/{{ $agent->image }}" width="80" height="80"></td>
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