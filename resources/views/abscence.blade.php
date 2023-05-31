@extends('grh')
@section('main')
<div class="container-fluid">
    <div class="d-flex justify-content-between bg-dark bg-gradient rounded p-2">
        <h3 class="text-light">Abscences</h3>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" disabled>
            Générer une Fiche
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Fiche d'abscence</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('abscence.store')}}">

                        @csrf
                        <div class="modal-body">
                            <select class="form-select" aria-label="Default select example" name="periode">
                                <option selected>Open this select menu</option>
                                @for ($mois = 1; $mois <= 12; $mois++) <option value="{{ $mois }}">{{ strftime('%B', mktime(0, 0, 0, $mois, 1)) }}</option>
                                    @endfor
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Créer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container p-3">
        @foreach($abscences as $abscence)
        @if($validatedAbscences->contains($abscence->id))
        <div class="d-flex justify-content-between mt-2 bg-secondary bg-gradient rounded p-2 text-light bg-opacity-75">
            <h3 class="text-light col-3">{{ date('F', mktime(0, 0, 0, $abscence->periode, 1)) }}</h3>
            <svg width="10" height="10" class="mt-2 col-8">
                <circle cx="5" cy="5" r="5" fill="#00FF00" /><!-- vert -->
            </svg>
            <a class="btn btn-sm text-light" href="{{route('abscence.show' , $abscence->id)}}">Voir</a>
        </div>
        @else
        <div class="d-flex justify-content-between mt-2 bg-secondary bg-gradient rounded p-2 text-light bg-opacity-75">
            <h3 class="col-3">{{ date('F', mktime(0, 0, 0, $abscence->periode, 1)) }}</h3>
            <svg width="10" height="10" class="mt-2 col-8">
                <circle cx="5" cy="5" r="5" fill="#FF0000" /><!-- rouge -->
            </svg>
            <a class="btn btn-sm btn-outline rounded text-light" href="{{route('abscence.show' , $abscence->id)}} ">Voir</a>
        </div>
        @endif
        @endforeach
    </div>
</div>

@endsection