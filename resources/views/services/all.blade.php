@extends('layouts.base')

@section('content')

    <h2>Tous les services</h2>

    <div class="row">
        <div class="col">
            <div class="row">
              <div class="col" style="padding-top: 20px;">
                <a href="{{ route('add_services') }}" class="btn btn-md btn-primary">Nouveau service</a> 
              </div>
            </div>
            <span class="mb-0 mt-6" id="infoAlert"></span>
            <div class="card card-small mt-4 p-4 mb-4"> 
              
                <table class="table table-striped">

                    <thead>
                      <tr>
                        <th scope="col">Nom du service</th>
                        <th scope="col">Acronyme</th>
                        <th scope="col">Responsable</th>
                        <th scope="col">Nbre employé</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach ($services as $service)
                        <tr>
                          <td> {{ $service->name }}</td>
                          <td> {{ $service->acronym }} </td>
                          <td> {{ $service->responsable_id }} </td>
                          <td> 12 </td>
                          <td> 
                            <div class="btn-group">
                              <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true", aria-expanded="false">
                                Action
                              </button>
                              <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">
                                  Consulter
                                </a>
                                <a href="/service/single/{{ $service->id }}/delete" class="dropdown-item">
                                  Supprimer
                                </a>
                              </div>
                            </div> 
                          </td>
                        </tr>
                      @endforeach
    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection