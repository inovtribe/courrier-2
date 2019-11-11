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
      <div class="card-body p-10 pb-3">
        <h4 class="text-center" style="padding: 10px;">Enregistrement d'un nouveau courrier</h4> <hr>

        <form action="/mails/add" method="POST" class="form" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-5">
              <h5 class="pb-20">Informations du Courrier</h5>
                <div class="form-group">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="">Doucment joint</label>
                  </div>
                  <div class="custom-file">
                    <input type="file" name="attachment" id="attachment" class="custom-file-input">
                    <label for="attachment" class="custom-file-label">Choisissez un fichier...</label>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="">Sujet</label>
                  </div>
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-heading"></i></span>
                  </div>
                <input type="text" value="{{ old('subject') }}" class="form-control" placeholder="Objet" name="subject">
                  <div style="width: 100%; text-align: left; color: red">
                    <i>{{ $errors->first('subject') }}</i> 
                  </div>
                </div>

                <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="">Nature de la requête</label>
                  </div>
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-cog"></i></span>
                  </div>
                  <select name="type" name="nature" class="form-control" id="nature">
                    <option value="" disabled>Choisissez la nature de la requête</option>
                    <option value="request">Requête</option>
                    <option value="demand">Demande</option>
                    <option value="other">Autre</option>
                  </select>
                </div>
                <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="">Catégorie du courrier</label>
                  </div>
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-cog"></i></span>
                  </div>
                  <select name="type" name="nature" class="form-control" id="nature">
                    <option value="" disabled>Choisissez la catégorie</option>
                    <option value="arrived">Courrier arrivé</option>
                    <option value="outgoing">Courrier sortant</option>
                    <option value="internal">Courrier interne</option>
                  </select>
                </div>
                <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="">Priorité</label>
                  </div>
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-cog"></i></span>
                  </div>
                  <select name="type" name="nature" class="form-control" id="nature">
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
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="">Expéditeur</label>
                  </div>
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                  </div>
                  <select name="type" name="expediteur" class="form-control" id="expediteur">
                    <option value="" disabled>Expéditeur</option>
                    <option value="user1">User 1</option>
                    <option value="user2">User 2</option>
                    <option value="user3">User 3</option>
                  </select>
                </div>
                <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="">Destinataire</label>
                  </div>
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                  </div>
                  <select name="destinataire" class="form-control" id="destinataire">
                    <option value="" disabled>Destinataire</option>
                    <option value="destinataire1">Destinataire 1</option>
                    <option value="destinataire2">Destinataire 2</option>
                    <option value="destinataire3">Destinataire 3</option>
                  </select>
                </div>
                <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="">Destinataires en copie</label>
                  </div>
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                  </div>
                  <select name="destinataire_en_copie" class="form-control" id="destinataire_en_copie">
                    <option value="" disabled>Destinataires en copie</option>
                    <option value="destinataire1">Destinataire 1</option>
                    <option value="destinataire2">Destinataire 2</option>
                    <option value="destinataire3">Destinataire 3</option>
                    <option value="destinataire4">Destinataire 4</option>
                    <option value="destinataire5">Destinataire 5</option>
                  </select>
                </div>
                <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="">Service initiateur</label>
                  </div>
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                  </div>
                  <select name="service_initiateur" class="form-control" id="service_initiateur">
                    <option value="" disabled>Service initiateur</option>
                    <option value="service1">Service 1</option>
                    <option value="service2">Service 2</option>
                    <option value="service3">Service 3</option>
                    <option value="service4">Service 4</option>
                    <option value="service5">Service 5</option>
                  </select>
                </div>
                <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="">Service traitant</label>
                  </div>
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                  </div>
                  <select name="service_traitant" class="form-control" id="service_traitant">
                    <option value="" disabled>Service traitant</option>
                    <option value="service1">Service 1</option>
                    <option value="service2">Service 2</option>
                    <option value="service3">Service 3</option>
                    <option value="service4">Service 4</option>
                    <option value="service5">Service 5</option>
                  </select>
                </div>
                <div class="form-group">
                  <div class="input-group mb-3" style="text-align: left">
                      <div class="col" style="padding-left: 0px; padding-top: 5px">
                        <label for="">Date limite de traitement</label>
                      </div>
                      <div class="col" style="padding-right: 5px">
                          <input class="form-control" data-date-format="dd/mm/yyyy" id="datepicker">
                      </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="">Liste des mots clés</label>
                  </div>
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-heading"></i></span>
                  </div>
                <input type="text" value="{{ old('subject') }}" class="form-control" placeholder="Mot clé" name="subject">
                  <div style="width: 100%; text-align: left; color: red">
                    {{-- <i>{{ $errors->first('subject') }}</i>  --}}
                  </div>
                </div>
                <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="">Détails</label>
                  </div>
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-info-circle"></i></span>
                  </div>
                  <textarea class="form-control" rows="4" name="details">
                      {{ old('details') }}
                  </textarea>
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