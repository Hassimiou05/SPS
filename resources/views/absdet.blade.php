@extends('grh')
@section('main')
<div class="container">
    <div class="d-flex justify-content-between">
        <h3>Fiche d'abscence N°{{$abscence->id}}</h3>
        <h3>Période: {{ date('F', mktime(0, 0, 0, $abscence->periode, 1)) }}</h3>
    </div>
    <hr>

    <div class="container">
        @if(!$abscenceValide)
        <form method="POST" action="{{ route('abscence.update', $abscence->id) }}">
            @method('PUT')
            @csrf
            <table id="myTable1" class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Nombre de jours d'absence</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($agents as $agent)
                    <tr>
                        <td>{{ $agent->id }}</td>
                        <td>{{ $agent->nom }}</td>
                        <td>{{ $agent->prenom }}</td>
                        <td>
                            <input type="hidden" name="agent_id[]" value="{{$agent->id}}">
                            <input type="number" class="form-control form-control-sm" name="nbre_jour[]" value="{{ old('nbre_jour.'.$agent->id) }}">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @php
            // Récupère la date actuelle
            $dateActuelle = \Illuminate\Support\Carbon::now();

            // Définit la date de début et la date de fin où le bouton est actif (du 25ème au 28ème jour de chaque mois)
            $dateDebut = \Illuminate\Support\Carbon::create($dateActuelle->year, $dateActuelle->month, 05, 0, 0, 0);
            $dateFin = \Illuminate\Support\Carbon::create($dateActuelle->year, $dateActuelle->month, 28, 23, 59, 59);

            // Vérifie si la date actuelle est comprise entre la date de début et la date de fin
            $boutonActif = $dateActuelle->between($dateDebut, $dateFin);
            @endphp
            <button {{ $boutonActif ? '' : 'disabled' }} type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
        @else
        <h1>Tas réussi petit con</h1>
        <table id="myTable1" class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Nombre de jours d'absence</th>
                </tr>
            </thead>
            <tbody>
                @foreach($agents as $agent)
                <tr>
                    <td>{{ $agent->id }}</td>
                    <td>{{ $agent->nom }}</td>
                    <td>{{ $agent->prenom }}</td>
                    <td>Test</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable1').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true
        });
    });
</script>
@endsection