@extends('grh')
@section('main')
@foreach($contrat as $contrat)

<div class="container">
    <div class="bg-dark d-flex p-2 rounded mb-2 justify-content-between">
        <h3 class="text-light">Gestion du site</h3>
        @if($agent->count() >= $contrat->nbre_agents)
        <button type="button" class="btn btn-sm btn-primary ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Attribuer les Agents
        </button>
        @else
        <button type="button" class="btn btn-sm btn-warning ms-2" data-bs-toggle="modal" data-bs-target="#ModifierModal">
            Modifier
        </button>
        @endif


    </div>

    <div class="container d-flex">
        <div class="col-6">
            <h3>Détails</h3>
            <p><b>ID: </b>{{$site->id}}</p>
            <p><b>Ville:</b> {{$site->ville}}</p>
            <p><b>Quartier:</b> {{$site->quartier}}</p>
            <p><b>Numéro de flotte:</b> {{$site->flotte}}</p>

        </div>
        <div class="col-6">
            <div class="d-flex">

                <!-- Button trigger modal -->


                <!-- Modal Ajouter -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Liste des agents</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('sites.update', $site->id )}}">
                                @method('PUT')
                                @csrf
                                <div class="modal-body">
                                    <div class="table-wrapper">
                                        <table class="table table-bordered align-middle table-sm">
                                            <thead class="table-dark align-middle">
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Nom</th>
                                                    <th>Prénom</th>
                                                    <th>Rôle</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach($agent as $agent)
                                                <tr>
                                                    <td>{{ $agent -> id }}</td>
                                                    <td>{{ $agent->nom }}</td>
                                                    <td>{{ $agent->prenom }}</td>
                                                    <td>{{ $agent->role }}</td>
                                                    <td>
                                                        <input class="form-check-input" type="checkbox" id="{{$agent->id}}" value="{{$agent->id}}" name="agents_id[]" data-nbre-agents="{{ $contrat->nbre_agents }}">
                                                    </td>

                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal Modifier -->
                <div class="modal fade" id="ModifierModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Liste des agents</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('sites.update', $site->id )}}">
                                @method('PUT')
                                @csrf
                                <div class="modal-body">
                                    <div class="table-wrapper">
                                        <table class="table table-bordered align-middle table-sm">
                                            <thead class="table-dark align-middle">
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Nom</th>
                                                    <th>Prénom</th>
                                                    <th>Rôle</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach($ag as $agent)
                                                <tr>

                                                    <td>{{ $agent->id }}</td>
                                                    <td>{{ $agent->nom }}</td>
                                                    <td>{{ $agent->prenom }}</td>
                                                    <td>{{ $agent->role }}</td>
                                                    <td>
                                                        <input class="form-check-input" type="checkbox" id="{{$agent->id}}" value="{{$agent->id}}" name="agents_id[]" data-nbre-agents="{{ $contrat->nbre_agents }}" @if(in_array($agent->id, explode(',', $site->select('agents_id')->first()->agents_id ?? [])))
                                                        checked
                                                        @endif>
                                                    </td>

                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <div class="d-flex justify-content-between">
                <div class="d-flex">
                    <h3>Agents du Site</h3>
                    @if(count($agents) == $contrat->nbre_agents)
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="green" class="bi bi-check-all" viewBox="0 0 16 16">
                        <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z" />
                    </svg>
                    @else
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="orange" class="bi bi-check2" viewBox="0 0 16 16">
                        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                    </svg>
                    @endif
                </div>
                <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">planning</button>
            </div>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h3 id="offcanvasRightLabel">Planning</h3>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    @if(DB::table('plannings')->where('site_id', $site->id)->count() <= 0) <form method="POST" action="{{ route('planning.store', $site->id )}}">
                        @csrf
                        @foreach($agents as $agent)
                        <input type="hidden" value="{{$agent->id}}" name="agent_id[]">
                        <input type="hidden" value="{{$site->id}}" name="site_id">
                        <div class="row mb-3">
                            <div class="col-5">
                                <p>{{$agent->id}} {{$agent->nom}} {{$agent->prenom}}</p>
                            </div>
                            <div class="col">
                                <select class="form-select form-select-sm" name="shift[]" id="{{$agent->id}}">
                                    @foreach(['day', 'night'] as $shift)
                                    <option value="{{ $shift }}" {{ old('shift') == $shift ? 'selected' : '' }}>{{ ucfirst($shift) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-select form-select-sm" aria-label="Default select example" name="rest_day[]" id="{{$agent->id}}">

                                    <option value="Lundi">Lundi</option>
                                    <option value="Mardi">Mardi</option>
                                    <option value="Mercredi">Mercredi</option>
                                    <option value="Jeudi">Jeudi</option>
                                    <option value="Vendredi">Vendredi</option>
                                    <option value="Samedi">Samedi</option>
                                    <option value="Dimanche">Dimanche</option>
                                </select>
                            </div>
                        </div>
                        @endforeach
                        <button type="submit" class="btn btn-sm btn-success">Valider</button>



                        </form>
                        @else
                        <form method="POST" action="{{ route('planning.update', $site->id )}}">
                            @csrf
                            @foreach($agents as $agent)
                            <input type="hidden" value="{{$agent->id}}" name="agent_id[]">
                            <input type="hidden" value="{{$site->id}}" name="site_id">
                            <div class="row mb-3">
                                <div class="col-5">
                                    <p>{{$agent->id}} {{$agent->nom}} {{$agent->prenom}}</p>
                                </div>
                                <div class="col">
                                    <select class="form-select form-select-sm" name="shift[]" id="{{$agent->id}}">
                                        @foreach(['day', 'night'] as $shift)
                                        <option value="{{ $shift }}" {{ old('shift') == $shift ? 'selected' : '' }}>{{ ucfirst($shift) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <select class="form-select form-select-sm" aria-label="Default select example" name="rest_day[]" id="{{$agent->id}}">

                                        <option value="Lundi">Lundi</option>
                                        <option value="Mardi">Mardi</option>
                                        <option value="Mercredi">Mercredi</option>
                                        <option value="Jeudi">Jeudi</option>
                                        <option value="Vendredi">Vendredi</option>
                                        <option value="Samedi">Samedi</option>
                                        <option value="Dimanche">Dimanche</option>
                                    </select>
                                </div>
                            </div>
                            @endforeach
                            <button type="submit" class="btn btn-sm btn-warning">Modifier</button>
                        </form>
                        @endif
                        <hr>
                        @if($planning)
                        @foreach($planning as $planning)
                        <h3>{{$planning->agent_id}}-{{$planning->shift}}-{{$planning->rest_day}}</h3>
                        @endforeach
                        @endif
                        <div id="dp"></div>
                </div>
            </div>

            <table class="table table-hover">

                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Tel</th>
                        <th scope="col">Rôle</th>
                    </tr>
                </thead>
                <tbody>


                    @foreach($agents as $agent)
                    <tr>
                        <td>{{$agent->id}}</td>
                        <td>{{$agent->nom}}</td>
                        <td>{{$agent->prenom}}</td>
                        <td>{{$agent->tel}}</td>
                        <td>{{$agent->role}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <hr>
    <div class="container d-flex">
        <div class="container col-6">
            <h3>Informations du client</h3>
            @foreach($client as $client)
            <p>Nom: {{$client->nom}}</p>
            <p>Prenom: {{$client->prenom}}</p>
            <p>Numéro de téléphone: {{$client->tel}}</p>
            @endforeach
        </div>
        <div class="container col-6">
            <h3>Détails du contrat</h3>

            <p><b>Status:</b> {{$contrat->status}}</p>
            <p><b>Date de début:</b> {{$contrat->date_debut}}</p>
            <p><b>Nombre d'agents:</b>{{$contrat->nbre_agents}}</p>

        </div>
    </div>
</div>

@endforeach
@endsection
@section('scripts')
<script>
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    const maxCheckboxes = checkboxes[0].getAttribute('data-nbre-agents'); // nombre maximum de cases à cocher

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            let checkedCount = 0;
            checkboxes.forEach(cb => {
                if (cb.checked) {
                    checkedCount++;
                }
            });

            checkboxes.forEach(cb => {
                if (!cb.checked && checkedCount >= maxCheckboxes) {
                    cb.disabled = true;
                } else {
                    cb.disabled = false;
                }
            });
        });
    });
</script>
@endsection