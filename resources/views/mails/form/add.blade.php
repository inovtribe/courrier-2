@extends('layouts.base')

@section('content')


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
      <div class="card-body p-10 pb-3 text-center">
        <h4 class="text-center" style="padding: 10px;">Enregistrement d'un nouveau courrier</h4> <hr>

        <form action="/mails/add" method="POST" class="form" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="row">
            <div class="col col-md-6 col-sm-6 col-xs-12">
              <h6>Informations du Courrier</h6>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-heading"></i></span>
                  </div>
                <input type="text" value="{{ old('subject') }}" class="form-control form-control-lg" placeholder="Objet" name="subject">
                  <div style="width: 100%; text-align: left; color: red">
                    <i>{{ $errors->first('subject') }}</i> 
                  </div>
                </div>

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-cog"></i></span>
                  </div>
                  <select name="type" name="nature" class="form-control form-control-lg" id="nature">
                    <option value="" disabled>Choisissez la nature de la requête</option>
                    <option value="request">Requête</option>
                    <option value="demand">Demande</option>
                    <option value="other">Autre</option>
                  </select>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-info-circle"></i></span>
                  </div>
                  <textarea class="form-control form-control-lg" rows="4" name="details">
                      {{ old('details') }}
                  </textarea>
                </div>
                <!-- <div class="custom-file">
                  <input type="file" name="attachment" id="attachment" class="custom-file-input">
                  <label for="attachment" class="custom-file-label">Choisissez un fichier...</label>
                </div> -->
              </div>

              
              <div class="col col-md-6 col-sm-6 col-xs-12">
                <h6>Informations de l'Expéditeur</h6>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                  </div>
                  <input type="text" class="form-control form-control-lg" placeholder="Noms et Prénoms" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                  </div>
                  <input type="text" class="form-control form-control-lg" placeholder="Adresse Email" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-map-marker-alt"></i></span>
                  </div>
                  <input type="text" class="form-control form-control-lg" placeholder="Adresse" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                  </div>
                  <input type="text" class="form-control form-control-lg" placeholder="Téléphone" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-mail-bulk"></i></span>
                  </div>
                  <input type="text" class="form-control form-control-lg" placeholder="Boite Postale" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <br>
                <div class="row">
                  <div class="col"  align="right">
                    <a href="{{ route('all_mails') }}" class="btn btn-danger">Annuler</a> &nbsp; &nbsp;
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                  </div>
                </div>
              </div>
            </div>
          </form>


        </div>
      </div>
    </div>
  </div>


@endsection