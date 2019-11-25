@extends('layouts.base')

@section('customCSS')
  <link href="{{ asset('bootstrap-datepicker/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
  <link href="{{ asset('multiselect/styles/choices.css') }}" rel="stylesheet">
  <link href="{{ asset('css/courrier.css') }}" rel="stylesheet">

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
    
    <div class="card card-small mb-4 container">
      <div class="card-body p-10 pb-3">
        <h4 class="text-center" style="padding: 10px;">Enregistrement d'un courrier arrivé</h4> <hr>
        <div class="col pl-0"  align="">
          <a href="{{ route('all_mails_arrived') }}" class="btn btn-light">
            <i class="fas fa-arrow-left"></i> &nbsp;
            Retour
          </a>
        </div>
        <form action="/courrier/add/arrived" method="POST" class="form" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-5">
              <h5 class="pb-20" style="border-bottom: 1px solid lightgray; padding-top: 15px; color: orange">Informations du Courrier</h5>
                <div class="form-group">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="">Doucment joint</label>
                  </div>
                  <div class="custom-file">
                    <input required type="file" name="attachment" id="attachment" class="custom-file-input" onchange="javascript:updateList()">
                    <label for="attachment" class="custom-file-label">Choisissez un fichier...</label>
                    <div class="pt-2" id="fileName">
                      {{-- <span class="file-name">finame.pdf<i class="fas fa-times-circle file-name-cross" id="cross"></i></span> --}}
                    </div>
                    <div style="width: 100%; text-align: left; color: red">
                      <i style="font-size: 9px">{{ $errors->first('attachment') }}</i> 
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="">Catégorie du courrier</label>
                  </div>
                  <select name="category" class="form-control" id="category">
                    <option value="" disabled>Choisissez la catégorie</option>
                    <option value="arrived" selected*>Courrier arrivé</option>
                  </select>
                </div>
                {{-- Utilisation d'Ajax pour récupérer les types de courier --}}
                <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="type_id">Type de courrier</label>
                  </div>
                  <select name="type_id" class="form-control" id="type">
                    <option value="" disabled>Choisissez Type de courrier</option>
                    @foreach ($types as $item)
                      <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                  </select>
                  <div style="width: 100%; text-align: left; color: red">
                    <i style="font-size: 9px">{{ $errors->first('type_id') }}</i> 
                  </div>
                </div>
                <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="">Priorité</label>
                  </div>
                  <select  name="priority" class="form-control" id="priority">
                    <option value="" disabled>Priorité du courrier</option>
                    <option value="Normal">Normal</option>
                    <option value="Nrgent">Urgent</option>
                    <option value="Très urgent">Très urgent</option>
                  </select>
                </div>
                <div class="input-group mb-3" style="text-align: left; padding-left: 0px">
                  <div class="col" style="padding-left: 0px">
                    <label for="">Confidentiel</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline1" value="Oui" name="confidentiality" class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline1">Oui</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline2" value="Non" name="confidentiality" class="custom-control-input" checked>
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
                    <label for="expeditor_id">Expéditeur</label>
                  </div>
                  <select name="expeditor_id" class="form-control" id="expediteur">
                    <option value="" disabled>Expéditeur</option>
                    @foreach ($expeditors_personal as $item)
                      <option value="{{ $item->id }}">{{ $item->first_name }} {{ $item->last_name }} </option>
                    @endforeach
                    @foreach ($expeditors_company as $item)
                      <option value="{{ $item->id }}">{{ $item->company_name }} </option>
                    @endforeach
                    <div style="width: 100%; text-align: left; color: red">
                      <i style="font-size: 9px">{{ $errors->first('expeditor_id') }}</i> 
                    </div>
                  </select>

                </div>
                {{-- Dossier qui va servire de classe nouvelle dans notrs SI --}}
                <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="">Nature</label>
                  </div>
                  <select name="nature" class="form-control" id="nature">
                    <option value="" disabled>Choisissez la nature du courrier</option>
                    <option value="Courrier simple">Courrier simple</option>
                    <option value="Dossier">Dossier</option>
                  </select>
                </div>
                {{-- <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="initiate_service_id">Service initiateur</label>
                  </div>
                  <select name="initiate_service_id" class="form-control" id="service_initiateur">
                    <option value="" disabled>Service initiateur</option>
                    @foreach ($services as $item)
                      <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                  </select>
                  <div style="width: 100%; text-align: left; color: red">
                    <i style="font-size: 9px">{{ $errors->first('initiate_service_id') }}</i> 
                  </div>
                </div> --}}
                <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="subject">Objet du courrier</label>
                  </div>
                    <input type="text" value="{{ old('subject') }}" class="form-control" placeholder="Objet du courrier" name="subject">
                  <div style="width: 100%; text-align: left; color: red">
                    <i style="font-size: 9px">{{ $errors->first('subject') }}</i> 
                  </div>
                </div>   
                {{-- <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="service_dealing">Service traitant</label>
                  </div>
                  <select name="service_dealing" class="form-control" id="service_traitant">
                    <option value="" disabled>Service traitant</option>
                    <option value=" "></option>
                    @foreach ($services as $item)
                      <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                  </select>
                  <div style="width: 100%; text-align: left; color: red">
                    <i style="font-size: 9px">{{ $errors->first('service_dealing') }}</i> 
                  </div> 
                </div>  --}}
                {{-- <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="">Destinataire</label>
                  </div>
                  <select name="destinator" class="form-control" id="destinataire">
                    <option value="" disabled>Destinataire</option>
                    <option value=" "></option>
                    @foreach ($destinators as $item)
                      <option value="{{ $item->id }}">{{ $item->username }}</option>
                    @endforeach
                  </select> 
                </div>  --}}
                {{-- <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="">Destinataires en copie</label>
                  </div>
                  <select name="destinator_in_copy" id="destinataire_multi" class="form-control" id="destinataire_en_copie" multiple>
                    <option value="" disabled>Destinataires en copie</option>
                    @foreach ($destinators as $item)
                      <option value="{{ $item->id }}">{{ $item->username }}</option>
                    @endforeach
                  </select>
                </div>           --}}
                {{-- <div class="form-group">
                  <div class="input-group mb-3" style="text-align: left">
                      <div class="col" style="padding-left: 0px; padding-top: 5px">
                        <label for="deadth_date">Date limite de traitement</label>
                      </div>
                      <div class="col" style="padding-right: 5px">
                          <input class="form-control" name="deadth_date" data-date-format="dd/mm/yyyy" id="datepicker3">
                      </div>
                      <div style="width: 100%; text-align: left; color: red">
                        <i style="font-size: 9px">{{ $errors->first('deadth_date') }}</i> 
                      </div>
                  </div> 
                </div>--}}
                <div class="col-12 pl-0">
                  <h6 style="border-bottom: 1px solid lightgray; padding-top: 15px; color: orange">Informations complémentaires</h6>
                  <div class="input-group mb-3">
                    <div class="keywords" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                      <label for="">Mots clés</label>
                    </div>
                    <input type="text" value="{{ old('keywords') }}" class="form-control" placeholder="Objet" name="keywords" id="keywords">
                  </div>  
                </div>
              </div>

              <div class="col-7 fixed" id="viewer">
              
              </div>
            </div>
            <div class="row" style="padding: 50px 0 30px 0px">
              <div class="col"  align="">
                <a href="{{ route('all_mails_arrived') }}" class="btn btn-secondary">Annuller</a> &nbsp; &nbsp;
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
  $("#del").click(function(){
    console.log("Pammmmmmmmmmmmmmmmmmmmmmmmmmmm");
    $("#nameBlock").remove()
  });
</script>

<script>

    WebViewer({
      // initialDoc: 'http://localhost:8000/doc/test.pdf',
      // initialDoc: 'http://localhost:8000/doc/mtn.docx',
      initialDoc: ' ',
      // extension: 'docx',
      showLocalFilePicker: true,
      path: 'http://localhost:8000/webviewer/',
      fullAPI: true,
    }, document.getElementById('viewer')).then(instance => {
      const docViewer = instance.docViewer;
      
      var filelist = new Array();
      var fileobjectlist = new Array();

      updateList = function(){
        var input = document.getElementById('attachment')
        var output = document.getElementById('fileName')

        var HTML = "<div>";
        
        for(var i = 0; i < input.files.length; ++i){
          console.log("aaaaaaaaaaaaaaa")
          filelist[i] = input.files.item(i).name;
          fileobjectlist[i] = input.files.item(i);
          HTML += '<span id="nameBlock" class="file-name">' + filelist[i] + '<i id="del" class="fas fa-times-circle file-name-cross"></i></span>'
        }

        HTML += "</div>";
        output.innerHTML += HTML;

        instance.loadDocument(fileobjectlist[0]);
      }

    });

  </script>

  <script>
    var secondElement = new Choices('#destinataire_multi', { allowSearch: false });
    // var secondElement = new Choices('#destinataire_multi', { allowSearch: false }).setValue(['Set value 1', 'Set value 2']);
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
        format:'yyyy-mm-dd'
    });
    $('#datepicker1').datepicker("setDate", new Date());

    $('#datepicker2').datepicker({
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
        format:'yyyy-mm-dd'
    });
    $('#datepicker2').datepicker("setDate", new Date());

    $('#datepicker3').datepicker({
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
        format:'yyyy-mm-dd'
    });
    $('#datepicker3').datepicker("setDate", new Date());
  </script>
@endsection