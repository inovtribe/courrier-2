@extends('layouts.base')

@section('content')

    <div class="container">
        <div class="col">
            <h3>Tous les courriers</h3>
            <div class="row">
              {{-- <div class="col" style="padding-top: 20px;">
                <a href="{{ route('add_arrived_mail') }}" class="btn btn-md btn-primary">Nouveau courier arrivé</a> 
              </div> --}}
            </div>
            <span class="mb-0 mt-6" id="infoAlert"></span>
            <div class="card card-small mt-4 p-4 mb-4"> 
              
                <table class="table table-striped" id="example">

                    <thead>
                      <tr>
                        <th scope="col">Reférence</th>
                        <th scope="col">Objet</th>
                        {{-- <th scope="col">Type</th> --}}
                        <th scope="col">Priorité</th>
                        <th scope="col">Date d'arrivéé</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>

                    <tbody>
                        @foreach ($all_mails as $item)
                          <tr>
                            <td> {{ $item->reference }}</td>
                            <td> {{ $item->subject }} </td>
                            {{-- <td> {{ $item->type->name }} </td> --}}
                            {{-- <td> {{ $item->priority }} </td> --}}
                            <td>
                            @if ($item->priority === 'Normal' )
                              {!! html_entity_decode("<i style='font-weight: bold' class='badge badge-success'>$item->priority</i>") !!}
                            @elseif($item->priority === 'Urgent' )
                              {!! html_entity_decode("<i style='font-weight: bold' class='badge badge-warning'>$item->priority</i>") !!}
                            @elseif($item->priority === 'Très urgent' )
                              {!! html_entity_decode("<i style='font-weight: bold' class='badge badge-danger'>$item->priority</i>") !!}
                            @endif
                            </td>
                            {{-- <td> {!! $item->priority === 'Normal' ? html_entity_decode("<i style='font-weight: bold' class='badge badge-success'>$item->priority</i>") : "" !!}</td> --}}
                            <td> {{ $item->mail_date_arrived }} </td>
                            <td> 
                              <a href="{{ route('delete_mail',$item->id) }}" class="btn btn-danger">Supprimer</a> 
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