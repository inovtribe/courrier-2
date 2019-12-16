@extends('layouts.base')

@section('content')

    <div class="container">
        <div class="col">
            <h3>Mes parapheurs</h3>
            <div class="row">
              {{-- @if ($profile->roles === 'AC')
                <div class="col" style="padding-top: 20px;">
                  <a href="{{ route('add_arrived_mail') }}" class="btn btn-md btn-primary">Nouveau courier arrivé</a> 
                </div>
              @endif --}}
            </div>
            <span class="mb-0 mt-6" id="infoAlert"></span>
            <div class="card card-small mt-4 p-4 mb-4"> 
              
                <table class="table table-striped" id="example">

                    <thead>
                      <tr>
                        <th scope="col">Titre</th>
                        <th scope="col">Expéditeur</th>
                        <th scope="col">Destinateur</th>
                        <th scope="col">Service</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>

                    <tbody>
                        @foreach ($paraphers as $item)
                          <tr>
                            <td> {{ $item->title }}</td>
                            <td> {{ $item->expeditor->first_name }} </td>
                            <td> {{ $item->destinator->first_name }} </td>
                            <td> {{ $item->service->acronym }} </td>
                            <td> 
                              <div class="btn-group">
                                <button class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true", aria-expanded="false">
                                  Action
                                </button>
                                <div class="dropdown-menu">
                                  <a href="/courrier/single/{{ $item->id }}/arrived" class="dropdown-item">
                                    visualiser
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

@section('customJS')

<script>
    $(document).ready(function(){
      $('#example').DataTable({
        "order": [[2, "desc"]]
      });
    });
</script>

@endsection