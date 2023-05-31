@extends('grh')
@section('main')
<div class="container">
    <div class="d-flex justify-content-between mb-3 bg-dark bg-gradient p-3 text-light rounded">
        <h3>Gestion des Sites</h3>
        <a type="button" href="{{ url('sites/create') }}" class="btn btn-sm btn-primary">Ajouter un site</a>
    </div>
    <table class="table mt-5 " id="myTable">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Ville</th>
                <th scope="col">Quartier</th>
                <th scope="col">Flotte</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sites as $site)
            <tr>
                <td>{{$site->id}}</td>
                <td>{{$site->ville}}</td>
                <td>{{$site->quartier}}</td>
                <td>{{$site->flotte}}</td>
                <td><a href="{{route('sites.show' , $site->id)}}">Voir</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div>
        <h1></h1>

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