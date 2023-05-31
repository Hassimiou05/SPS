@extends('grh')
@section('main')
<h1>Fiche de paie N° <span>{{$fdp->id}}</span></h1>
<h3>Période du <span>{{$fdp->datedebut}}</span> au <span>{{$fdp->datefin}}</span></h3>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Salaire</th>
        </tr>
    </thead>
    <tbody>
        @foreach($salaireAgents as $agent)
        <tr>
            <td>{{$agent['id']}}</td>
            <td>{{$agent['nom']}}</td>
            <td>{{$agent['prenom']}}</td>
            <td>
                {{$agent['salaire']}}
            </td>
        </tr>
        @endforeach
        <tr>
            <td colspan="3">Total</td>
            <td> GNF</td>
        </tr>
    </tbody>
</table>
@endsection