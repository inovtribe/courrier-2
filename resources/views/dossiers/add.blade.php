@extends('layouts.base')

@section('customCSS')
  {{-- <link href="{{ asset('bootstrap-datepicker/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
  <link href="{{ asset('multiselect/styles/choices.css') }}" rel="stylesheet">
  <link href="{{ asset('css/courrier.css') }}" rel="stylesheet"> --}}

  {{-- <style>
    .choices{
      width: 100%;
    }
  </style> --}}
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
  <div class="col">
    <span class="mb-0 mt-6" id="infoAlert"></span>
    
    <div class="card card-small mb-4 container">
      <div class="card-body p-10 pb-3">
        <h4 class="text-center" style="padding: 10px;">Création de nouveau dossier</h4> <hr>
        <div class="col pl-0"  align="">
          <a href="{{ route('all_folders') }}" class="btn btn-light">
            <i class="fas fa-arrow-left"></i> &nbsp;
            Retour
          </a>
        </div>
        <form action="{{ route('add_folder') }}" method="POST" class="form">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-5" style="padding-top: 50px">
              <div class="form-group">
                <label for="name">Nom du dossier</label>
                <input type="text" name="name" id="name" class="form-control" />
                <div style="width: 100%; text-align: left; color: red">
                  <i style="font-size: 9px">{{ $errors->first('name') }}</i> 
                </div>
              </div>

              <div class="input-group mb-3">
                <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                  <label for="is_open">Etat</label>
                </div>
                <select name="is_open" class="form-control" id="is_open">
                  <option value="" disabled>Etat du dossier</option>
                  <option value="true" selected*>Ouvert</option>
                  <option value="false" selected*>Fermé</option>
                </select>
              </div>
                
              <div class="input-group mb-3">
                <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                  <label for="service_id">Service</label>
                </div>
                <select name="service_id" class="form-control" id="service_id">
                  <option value="" disabled>Service initiateur</option>
                  @foreach ($services as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                  @endforeach
                  <div style="width: 100%; text-align: left; color: red">
                    <i style="font-size: 9px">{{ $errors->first('service_id') }}</i> 
                  </div>
                </select>
              </div>
             
              </div>
            </div>
            <div class="row" style="padding: 50px 0 30px 0px">
              <div class="col"  align="">
                <a href="{{ route('all_folders') }}" class="btn btn-secondary">Annuler</a> &nbsp; &nbsp;
                <button type="submit" class="btn btn-primary">Enregistrer</button>
              </div>
            </div>
          </form>


        </div>
      </div>
    </div>
  </div>


@endsection

@section('customJS')
@endsection