@extends('layouts.base')

@section('content')

    <div class="container">
        <div class="col">
            <h3>Tous les Dossier</h3>
            <div class="row">
              <div class="col" style="padding-top: 20px;">
                <a href="{{ route('folder_form') }}" class="btn btn-md btn-primary">Nouveau Dossier</a> 
                {{-- <a href="#" class="btn btn-md btn-primary">Nouveau Dossier</a>  --}}
              </div>
            </div>
            <span class="mb-0 mt-6" id="infoAlert"></span>
            <div class="card card-small mt-4 p-4 mb-4"> 
              
                <table class="table table-striped" id="example">

                    <thead>
                      <tr>
                        <th scope="col">Reférence</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Etat</th>
                        <th scope="col">Date d'ouverture</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach ($allFolders as $item)
                        <tr>
                          <td> {{ $item->reference }}</td>
                          <td> {{ $item->name }} </td>
                          <td> {{ $item->is_open }} </td>
                          <td> {{ $item->open_date }} </td>
                          <td> 
                            <div class="btn-group">
                              <button class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true", aria-expanded="false">
                                Action
                              </button>
                              <div class="dropdown-menu">
                                <a href="{{ route('single_folder', $item->id) }}" class="dropdown-item">
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

@section('customJS')
    
<script>
    $(document).ready(function(){
      $('#example').DataTable();
    });
</script>
@endsection