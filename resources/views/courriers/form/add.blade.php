@extends('layouts.base')

@section('customCSS')
  <link href="{{ asset('bootstrap-datepicker/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
  <link href="{{ asset('multiselect/styles/choices.css') }}" rel="stylesheet">

  <style>
    .choices{
      width: 100%;
    }
  </style>
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
                    <label for="">Catégorie du courrier</label>
                  </div>
                  <select name="category" class="form-control" id="nature">
                    <option value="" disabled>Choisissez la catégorie</option>
                    <option value="arrived">Courrier arrivé</option>
                    <option value="outgoing">Courrier départ</option>
                    <option value="internal">Courrier interne</option>
                  </select>
                </div>
                {{-- Utilisation d'Ajax pour récupérer les types de courier --}}
                <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="">Type de courrier</label>
                  </div>
                  <select name="type" class="form-control" id="nature">
                    <option value="" disabled>Choisissez Type de courrier</option>
                    <option value="request">Demande de stage</option>
                    <option value="demand">Requêtes</option>
                    <option value="other">other</option>
                  </select>
                </div>
                <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="">Priorité</label>
                  </div>
                  <select  name="priority" class="form-control" id="nature">
                    <option value="" disabled>Priorité du courrier</option>
                    <option value="normal">Normal</option>
                    <option value="urgent">Urgent</option>
                    <option value="very_urgent">Très urgent</option>
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
                        <input class="form-control" name="mail_date" data-date-format="dd/mm/yyyy" id="datepicker1">
                    </div>
                </div>
                <div class="input-group mb-3" style="text-align: left">
                    <div class="col" style="padding-left: 0px; padding-top: 5px">
                      <label for="">Date d'arrivée</label>
                    </div>
                    <div class="col" style="padding-right: 5px">
                        <input class="form-control" name="mail_date_arrived" data-date-format="dd/mm/yyyy" id="datepicker2">
                    </div>
                </div>
                <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="">Expéditeur</label>
                  </div>
                  <select name="expeditor" class="form-control" id="expediteur">
                    <option value="" disabled>Expéditeur</option>
                    if
                    @foreach ($destinataire as $item)
                      <option value="{{ $item }}">{{ $item }}</option>
                    @endforeach
                  </select>
                </div>
                {{-- Dossier qui va servire de classe nouvelle dans notrs SI --}}
                <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="">Nature</label>
                  </div>
                  <select name="nature" class="form-control" id="nature">
                    <option value="" disabled>Choisissez la nature du courrier</option>
                    <option value="1">Courrier</option>
                    <option value="2">Dossier</option>
                  </select>
                </div>
                <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="">Service initiateur</label>
                  </div>
                  <select name="initiate_service" class="form-control" id="service_initiateur">
                    <option value="" disabled>Service initiateur</option>
                    @foreach ($services as $item)
                      <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="">Objet</label>
                  </div>
                    <input type="text" value="{{ old('subject') }}" class="form-control" placeholder="Objet" name="subject">
                  {{-- <div style="width: 100%; text-align: left; color: red">
                    <i>{{ $errors->first('subject') }}</i> 
                  </div> --}}
                </div>   
                <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="">Mots clés</label>
                  </div>
                  <input type="text" value="{{ old('keywords') }}" class="form-control" placeholder="Objet" name="keywords" id="keywords">
                </div>  
                <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="service_dealing">Service traitant</label>
                  </div>
                  <select name="service_dealing" class="form-control" id="service_traitant">
                    <option value="" disabled>Service traitant</option>
                    @foreach ($services as $item)
                      <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                  </select>
                </div> 
                <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="">Destinataire</label>
                  </div>
                  <select name="destinator" class="form-control" id="destinataire">
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
                  <select name="destinator_in_copy" id="destinataire_multi" class="form-control" id="destinataire_en_copie" multiple>
                    <option value="" disabled>Destinataires en copie</option>
                    <option value="destinataire1">Destinataire 1</option>
                    <option value="destinataire2">Destinataire 2</option>
                    <option value="destinataire3">Destinataire 3</option>
                    <option value="destinataire4">Destinataire 4</option>
                    <option value="destinataire5">Destinataire 5</option>
                  </select>
                </div>          
                
                <div class="form-group">
                  <div class="input-group mb-3" style="text-align: left">
                      <div class="col" style="padding-left: 0px; padding-top: 5px">
                        <label for="">Date limite de traitement</label>
                      </div>
                      <div class="col" style="padding-right: 5px">
                          <input class="form-control" name="deadth_date" data-date-format="dd/mm/yyyy" id="datepicker3">
                      </div>
                  </div>
                </div>

                {{-- <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="">Liste des mots clés</label>
                  </div>
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-heading"></i></span>
                  </div>
                <input type="text" value="{{ old('subject') }}" class="form-control" placeholder="Mot clé" name="subject">
                  <div style="width: 100%; text-align: left; color: red">
                    <i>{{ $errors->first('subject') }}</i> 
                  </div>
                </div> --}}
                {{-- <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="">Détails</label>
                  </div>
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-info-circle"></i></span>
                  </div>
                  <textarea class="form-control" rows="4" name="details">
                      {{ old('details') }}
                  </textarea>
                </div> --}}
              </div>
              <div class="col-7 fixed" id="viewer">
              
              </div>
            </div>
            <div class="row" style="padding: 50px 0 30px 0px">
              <div class="col"  align="">
                <a href="{{ route('all_mails') }}" class="btn btn-danger">Annuler</a> &nbsp; &nbsp;
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
<script src="{{ asset('bootstrap-datepicker/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('multiselect/scripts/choices.min.js') }}" type="text/javascript"></script>


<script src="{{ asset('webviewer/webviewer.js') }}" type="text/javascript"></script>
  <script>
    $(document).ready(function(){
        $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            alert('The file "' + fileName +  '" has been selected.');
        });
    });
  </script>
  <script>

    WebViewer({
      // initialDoc: 'http://localhost:8000/doc/test.pdf',
      initialDoc: 'http://localhost:8000/doc/mtn.docx',
      extension: 'docx',
      showLocalFilePicker: true,
      fullAPI: true,
    }, document.getElementById('viewer')).then(instance => {
      // WebViewer is initialized
    });
  </script>

  <script>
    var secondElement = new Choices('#destinataire_multi', { allowSearch: false }).setValue(['Set value 1', 'Set value 2']);
    var destinator = document.getElementById('destinataire_multi');
    // destinator.options[0].value
    // destinator.length
    // We will make a circular statememnt to take each value from length and attribuate those values to name variable of request
    console.log("destinator list", destinator);
  </script>

  <script>
    var firstElement = document.getElementById('keywords');
    var choices1 = new Choices(firstElement, {
        delimiter: ',',
        editItems: true,
        removeButton: true
    });
  </script>

  <script type="text/javascript">
    $('#datepicker1').datepicker({
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
    });
    $('#datepicker1').datepicker("setDate", new Date());

    $('#datepicker2').datepicker({
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
    });
    $('#datepicker2').datepicker("setDate", new Date());

    $('#datepicker3').datepicker({
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
    });
    $('#datepicker3').datepicker("setDate", new Date());
  </script>
@endsection