@extends('layouts.base')

@section('content')

    <h2>Tous les types de courrier</h2>

    <div class="row">
        <div class="col">
            <div class="row">
              <div class="col" style="padding-top: 20px;">
                <a href="{{ route('add_types') }}" class="btn btn-md btn-primary">Nouveau type de courrier</a> 
              </div>
            </div>
            <span class="mb-0 mt-6" id="infoAlert"></span>
            <div class="card card-small mt-4 p-4 mb-4"> 
              
                <table class="table table-striped">

                    <thead>
                      <tr>
                        <th scope="col">Libéllé du type</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach ($types as $item)
                        <tr>
                          <td> {{ $item->name }}</td>
                          <td> 
                            <a href="#" class="btn btn-primary">Consulter</a> 
                            <a href="" class="btn btn-danger">Supprimer</a> 
                          </td>
                        </tr>
                      @endforeach
    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection