@extends('layouts.base')

@section('content')

    <div class="container">
        <div class="col">
            <h3>Demandes d'avis</h3>
            <span class="mb-0 mt-6" id="infoAlert"></span>
            <div class="card card-small mt-4 p-4 mb-4"> 
              
                <table class="table table-striped">

                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Courrier</th>
                        <th scope="col">Expéditeur</th>
                        <th scope="col">Date Limite</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach ($demandes as $item)
                        <tr>
                          <td> {{ $item->id }} </td>
                          <td> {{ $item->demandeAvis->courrier->subject }}</td>
                          <td> {{ $item->profile->first_name.' '.$item->profile->last_name }} </td>
                          <td> {{ $item->demandeAvis->limit_date }} </td>
                          <td> 
                            <div class="btn-group">
                              <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true", aria-expanded="false">
                                Action
                              </button>
                              <div class="dropdown-menu">
                                <a href="{{ route('avis_mail', $item->demandeAvis->courrier->id) }}" class="dropdown-item">
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
                    </tbody>
                </table>
    
    
            </div>
        </div>
    </div>

@endsection