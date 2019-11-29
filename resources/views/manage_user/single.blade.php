@extends('layouts.base')

@section('customCSS')
 
@endsection


@section('content')

<!-- Page Header -->
<div class="page-header row no-gutters py-4">
  <div class="col-12 col-sm-4 text-center text-sm-left mb-0"
  style="float: right;margin-right: 0px;" >
    <!-- Drop down action menu -->
  </div>

</div>
<!-- End Page Header -->

<!-- Default Light Table -->

<div class="row">
  <div class="container">
    <span class="mb-0 mt-6" id="infoAlert"></span>
    
    <div class="card card-small mb-4 offset-md-3 col-6">
      <div class="card-body p-10 pb-5">
        <h4 class="text-center" style="padding: 10px;">Profile de {{ $profile->username }} </h4> <hr>
        <br />
        <div class="container">
          <div class="col-12">
            <p><b style="font-weight: bold">Nom et prénom</b>: {{ $profile->first_name }} {{ $profile->last_name }}</p>
            <p><b style="font-weight: bold">Téléphone</b>: {{ $profile->phone }}</p>
            <p><b style="font-weight: bold">Adresse</b>: {{ $profile->address }}</p>
            @if ($profile->service_id)
              <p><b style="font-weight: bold">Service</b>: {{ $profile->service->name }}</p>
            @else
              <p><b style="font-weight: bold">Service</b>: {{ 'Aucun service' }}</p>
            @endif
            
            <p><b style="font-weight: bold">Roles</b>: {{ $profile->role }}</p>

            <a href="/manage/users/{{ $profile->id }}/edit" class="btn btn-secondary">
              Modifier
            </a>
            <a href="{{ route('manage_user_list') }}" class="btn btn-danger">Annuler</a> &nbsp; &nbsp;
          </div>
        </div>
       


        </div>
      </div>
    </div>
  </div>


@endsection
