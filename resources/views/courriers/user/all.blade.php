@extends('layouts.base')

@section('content')

    <div class="container">
        <div class="col">
            <h3>Tous mes courriers</h3>
            <span class="mb-0 mt-6" id="infoAlert"></span>
            <div class="card card-small mt-4 p-4 mb-4"> 
              
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
                      @foreach ($courriers as $item)
                        <tr>
                          <td> {{ $item->reference }}</td>
                          <td> {{ $item->subject }} </td>
                          <td> {{ $item->type_id }} </td>
                          <td> {{ $item->category }} </td>
                          <td> {{ $item->mail_date_arrived }} </td>
                          <td> 
                            <div class="btn-group">
                              <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true", aria-expanded="false">
                                Action
                              </button>
                              <div class="dropdown-menu">
                                <a href="{{ route('single_user_mail', $item->id) }}" class="dropdown-item">
                                  Consulter
                                </a>
                                <a href="/courrier/single/{{ $item->id }}/delete" class="dropdown-item">
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