@extends('layouts.base')


@section('content')

    <div class="container">
        <div class="col">
        <h3>Tous les profiles</h3>
            <span class="mb-0 mt-6" id="infoAlert"></span>
            <div class="card card-small mt-4 p-4 mb-4"> 
              
                <table class="table table-striped">

                    <thead>
                      <tr>
                        <th scope="col">Pseudo</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Téléphone</th>
                        <th scope="col">Roles</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach ($profiles as $item)
                        <tr>
                          <td> {{ $item->username }}</td>
                          <td> {{ $item->first_name }} </td>
                          <td> {{ $item->last_name }} </td>
                          <td> {{ $item->phone }} </td>
                          <td> {{ $item->roles }} </td>
                          <td> 
                            <div class="btn-group">
                              <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true", aria-expanded="false">
                                Action
                              </button>
                              <div class="dropdown-menu">
                                <a href="/manage/users/{{ $item->id }}/single" class="dropdown-item">
                                  Consulter
                                </a>
                                <a href="/manage/users/{{ $item->id }}/edit" class="dropdown-item">
                                  Modifier
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