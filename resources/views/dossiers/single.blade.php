@extends('layouts.base')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12"></div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="">
            <div class="card-header">
              <div class="col-12" >
                <h3>Dossier {{ $dossier->reference }}</h3>
                <hr>
              </div>
            </div>
            <div class="card-body">
              <div class="col-12">
                <h4> {{ $dossier->name }} </h4>
                <p>
                  Date d'ouverture: {{ $dossier->open_date }} <br>
                  Service traitant: {{ $dossier->service->name }} <br>
                  @if ($dossier->responsable)
                    Chargé du dossier: {{ $dossier->responsable->first_name.' '.$dossier->responsable->last_name }}
                  @endif
                </p>
              </div>
              <div class="col-12">
                <h4>Courriers contenus dans le dossier</h4>
                <table class="table table-striped">

                    <thead>
                      <tr>
                        <th scope="col">Reférence</th>
                        <th scope="col">Objet</th>
                        <th scope="col">Type</th>
                        <th scope="col">Catégory</th>
                        <th scope="col">Date d'arrivéé</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>

                    <tbody>
                      @if ($courriers)
                        @foreach ($courriers as $item)
                          <tr>
                            <td> {{ $item->reference }}</td>
                            <td> {{ $item->subject }} </td>
                            <td> {{ $item->type->name }} </td>
                            <td> {{ $item->category }} </td>
                            <td> {{ $item->mail_date_arrived }} </td>
                            <td> 
                              <div class="btn-group">
                                <button class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true", aria-expanded="false">
                                  Action
                                </button>
                                <div class="dropdown-menu">
                                  {{-- <a href="/courrier/single/{{ $item->id }}/valid" class="dropdown-item"> --}}
                                  <a href="#" class="dropdown-item">
                                    Consulter
                                  </a>
                                  {{-- <a href="/courrier/single/{{ $item->id }}/delete" class="dropdown-item">
                                    Supprimer
                                  </a> --}}
                                </div>
                              </div>
                            </td>
                          </tr>
                        @endforeach
                      @endif
                    </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
{{-- name
reference
is_open
open_date
close_date
responsable_id
service_id --}}