@extends('clientview')

@section('cli')
<div class="container">
    <div class="d-flex justify-content-between bg-dark rounded p-2 mb-2">
        <h3 class="text-light">Informations du client</h3>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Envoyer un mail
        </button>
    </div>
    <div class="d-flex justify-content-between">



        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Envoyer un email</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('send-email') }}">
                        @csrf
                        <div class="modal-body">

                            <div class="col">
                                <label for="title">Titre</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="col">
                                <label for="message">Message</label>
                                <textarea class="form-control" name="content"></textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <table class="table">
        <tr>
            <td>
                <h3>Détails</h3>
                <p><b>Id:</b> {{$client->client_id}}</p>
                <p><b>Nom:</b> {{$client->nom}}</p>
                <p><b>Prenom:</b> {{$client->prenom}}</p>
                <p><b>N° de téléphone:</b> {{$client->tel}}</p>
                <p><b>Lieu de résidence:</b> {{$client->lieu_residence}}</p>
                <p><b>Email:</b> {{$client->mail}}</p>

            </td>
            <td>
                <div class="accordion" id="accordionExample">
                    <h3>Contrat</h3>
                    @foreach($cont as $cont)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <p><b>Date de début: </b>{{$cont->date_debut}}</p>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p><b>ID: </b>{{$cont->id}}</p>
                                <p><b>Status du contrat:</b> {{$cont->status}}</p>
                                <p><b>Nombre d'agents:</b> {{$cont->nbre_agents}}</p>
                                <a class="btn btn-primary" href="#">Modifier</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </td>
        </tr>

    </table>
    <div class="d-flex justify-content-between">
        <a class="btn btn-success btn-sm" href="{{url('/clients')}}">Retour</a>
        <form method="POST" action="{{route('clients.destroy' , $client->client_id) }}">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm ">Supprimer</button>
        </form>
    </div>
</div>
@endsection