@extends('layouts.base')

@section('customCSS')
  <link href="{{ asset('bootstrap-datepicker/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
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

<div class="container">
  <div class="col">
    <span class="mb-0 mt-6" id="infoAlert"></span>
    
    <div class="card card-small mb-4 container">
        <h4 class="text-center" style="padding: 10px;">Emmettre un avis</h4> <hr>
        <div class="col pl-20 pb-20"  align="">
          <a href="{{ route('avis_request_all') }}" class="btn btn-light">
            <i class="fas fa-arrow-left"></i> &nbsp;
            Retour
          </a>
        </div>
        
        <div class="row">
          <div class="col-5 pl-50px" style="padding-left: 30px;">
            <h5 class="pb-20" style="border-bottom: 1px solid lightgray; padding-top: 15px; color: orange">
              Informations sur le courrier
            </h5>
              
            <div class="input-group mb-3">
              <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                <label for="selected_file">Documents</label>
              </div>
              <select name="selected_file" class="form-control" id="selected_file">
                <option value=""></option>
                @foreach ($attached_files as $item)
                  <option value="{{ $item->path }}">{{ $item->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="input-group mb-3">
              <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                <label for="">Objet du courrier</label>
              </div>
              <input type="text" disabled value="{{ $courrier->subject }}" class="form-control" placeholder="Objet" name="subject">
            </div> 
            
            <div class="input-group mb-3">
              <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                <label for="">Type de courrier</label>
              </div>
              <input type="text" disabled value="{{ $courrier->type->name }}" class="form-control" placeholder="" name="subject">
            </div> 
            
            <div class="input-group mb-3">
              <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                <label for="">Priorité</label>
              </div>
              <input type="text" disabled value="{{ $courrier->priority }}" class="form-control" placeholder="" name="subject">
            </div>
            
            <div class="input-group mb-3">
              <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                <label for="">Confidentiel</label>
              </div>
              <input type="text" disabled value="{{ $courrier->confidentiality }}" class="form-control" placeholder="" name="subject">
            </div> 
            
            <div class="input-group mb-3">
              <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                <label for="">Nature</label>
              </div>
              <input type="text" disabled value="{{ $courrier->nature }}" class="form-control" placeholder="" name="subject">
            </div> 

            <div class="input-group mb-3">
              <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                <label for="">Expéditeur</label>
              </div>
              <input type="text" disabled value="{{ $courrier->expeditor->first_name." ".$courrier->expeditor->last_name }}" class="form-control" placeholder="" name="subject">
            </div> 
          </div>

          <div class="col-7 fixed" id="viewer">
            
          </div>
        </div>

        <div class="row" style="padding: 50px 0 30px 20px">
          <div class="col pl-20"  align="">
              <a href="#" class="btn btn-secondary"> 
                {{-- <i class="fas fa-pen"></i>  --}}
                Annuler
              </a> &nbsp; &nbsp;
              <button class="btn btn-primary" data-toggle="modal" data-target="#avisModalCenter">
                  <i class="fas fa-plus"></i> 
                  Ajouter un avis
              </button>
          </div>
        </div>
            
      </div>
    </div>
  </div>



<!-- Modal -->
<div class="modal fade" id="avisModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Ajouter un avis</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('add_new_avis', $courrier->id) }}" method="POST" class="form">
          {{ csrf_field() }}
          {{-- {{ method_field('PATCH') }} --}}
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="motif">Motif</label>
                  <input type="text" name="motif" id="motif" class="form-control" />
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label for="contenu">Contenu</label>
                    <textarea name="contenu" id="contenu" class="form-control"></textarea>
                  </div>
                </div>
            </div> 
          </div>
          <div class="modal-footer">
            <div class="col text-center">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuller</button>
              <button type="submit" class="btn btn-success">Eregistrer</button>
            </div>
          </div>
        </form>
          
      </div>
    </div>
  </div>
  
@endsection

@section('customJS')

<script src="{{ asset('webviewer/ui-legacy/external/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('webviewer/webviewer.js') }}" type="text/javascript"></script>
<script src="{{ asset('bootstrap-datepicker/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>


<script>
    WebViewer({
      // initialDoc: 'http://localhost:8000/doc/test.pdf',
      // initialDoc: ' ',
      // extension: 'pdf',
      showLocalFilePicker: true,
      path: 'http://localhost:8000/webviewer/',
      fullAPI: true,
    }, document.getElementById('viewer')).then(instance => {
      document.getElementById('selected_file').onchange = function(e){
        // console.log('LeCourrier>>>>>>>>>>' ,e.target)
        // var link = "/pieces_jointes/" + e.target.innerText;
        var link = e.target.value;
        console.log(link)
        instance.loadDocument(link);
      }
    });


  $('#datepicker').datepicker({
      weekStart: 1,
      daysOfWeekHighlighted: "6,0",
      autoclose: true,
      todayHighlight: true,
      format:'yyyy-mm-dd'
  });
  $('#datepicker').datepicker("setDate", new Date());

  </script>

  
@endsection
