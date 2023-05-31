<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 7 PDF Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="container-fluid">
        <h1 class="">Tous les agents</h1>
        <div class="table-wrapper">
            <table class="table table-bordered align-middle table-sm">
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


                    </tr>
                </thead>
                <tbody>
                    @foreach($agents as $agent)
                    <tr>

                        <td>{{ $agent -> id }}</td>
                        <td>{{ $agent->nom }}</td>
                        <td>{{ $agent->prenom }}</td>
                        <td>{{ $agent->type }}</td>
                        <td>{{ $agent->date_naissance }}</td>
                        <td>{{ $agent->lieu_naissance }}</td>
                        <td>{{ $agent->lieu_residence }}</td>

                        <td>{{ $agent->tel }}</td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</body>