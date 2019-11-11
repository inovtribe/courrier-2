@extends('layouts.base')

@section('customCSS')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
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
                    <span class="input-group-text"><i class="fa fa-cog"></i></span>
                  </div>
                  <select name="type" name="nature" class="form-control form-control-lg" id="nature">
                    <option value="" disabled>Choisissez la catégorie</option>
                    <option value="arrived">Courrier arrivé</option>
                    <option value="outgoing">Courrier sortant</option>
                    <option value="internal">Courrier interne</option>
                  </select>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-cog"></i></span>
                  </div>
                  <select name="type" name="nature" class="form-control form-control-lg" id="nature">
                    <option value="" disabled>Priorité du courrier</option>
                    <option value="very_urgent">Très urgent</option>
                    <option value="urgent">Urgent</option>
                    <option value="normal">Normal</option>
                  </select>
                </div>
                <div class="input-group mb-3" style="text-align: left; padding-left: 0px">
                  <div class="col" style="padding-left: 0px">
                    <label for="">Confidentialité</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline1" name="confidential" class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline1">Oui</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline2" name="confidential" class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline2">Non</label>
                  </div>
                </div>
                <div class="input-group mb-3" style="text-align: left">
                    <div class="col" style="padding-left: 0px; padding-top: 5px">
                      <label for="">Date du courrier</label>
                    </div>
                    <div class="col" style="padding-right: 5px">
                        <input class="form-control" data-date-format="dd/mm/yyyy" id="datepicker">
                    </div>
                </div>
                <div class="input-group mb-3" style="text-align: left">
                    <div class="col" style="padding-left: 0px; padding-top: 5px">
                      <label for="">Date d'arrivée</label>
                    </div>
                    <div class="col" style="padding-right: 5px">
                        <input class="form-control" data-date-format="dd/mm/yyyy" id="datepicker">
                    </div>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                  </div>
                  <select name="type" name="nature" class="form-control form-control-lg" id="nature">
                    <option value="" disabled>Expéditeur</option>
                    <option value="user1">User 1</option>
                    <option value="user2">User 2</option>
                    <option value="user3">User 3</option>
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
                <div class="custom-file">
                  <input type="file" name="attachment" id="attachment" class="custom-file-input">
                  <label for="attachment" class="custom-file-label">Choisissez un fichier...</label>
                </div>
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

@section('customJS')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  <style type="text/css">
    // solution 1:
    .datepicker {
        font-size: 0.875em;
    }
    /* solution 2: the original datepicker use 20px so replace with the following:*/
    
    .datepicker td, .datepicker th {
        width: 1.5em;
        height: 1.5em;
    }
  </style>
  <script type="text/javascript">
  $('#datepicker').datepicker({
      weekStart: 1,
      daysOfWeekHighlighted: "6,0",
      autoclose: true,
      todayHighlight: true,
  });
  $('#datepicker').datepicker("setDate", new Date());
  </script>
@endsection