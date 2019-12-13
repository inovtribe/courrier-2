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
  <div class="col">
    <span class="mb-0 mt-6" id="infoAlert"></span>
    
    <div class="card card-small mb-4">
      <div class="card-body p-10 pb-3">
        <h4 class="text-center" style="padding: 10px;">Enregistrement d'un type de courrier</h4> <hr>

        <form action="/types/add" method="POST" class="form">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-6">
              <div id="personal">
                <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="name">Libéllé du type</label>
                  </div>
                    <input type="text" value="{{ old('name') }}" class="form-control" placeholder="Libéllé" name="name">
                  <div style="width: 100%; text-align: left; color: red">
                    <i style="font-size: 9px" >{{ $errors->first('name') }}</i> 
                  </div>
                </div>
              </div>
            </div>
            </div>

            <div class="row" style="padding: 50px 0 30px 0px">
              <div class="col"  align="left">
                <a href="{{ route('types') }}" class="btn btn-danger">Annuler</a> &nbsp; &nbsp;
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
    <script src="{{ asset('webviewer/ui-legacy/external/jquery-3.2.1.min.js') }}" type="text/javascript"></script>

    <script>
    </script>
@endsection