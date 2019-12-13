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

<div class="container">
  <div class="col">
    <span class="mb-0 mt-6" id="infoAlert"></span>
    
    <div class="card card-small mb-4 container">
      <div class="card-body p-10 pb-3">
        <h5 class="text-center" style="padding: 10px; text-transform: uppercase">{{ $courrier->subject }}</h5> <hr>
        <div class="col pl-0"  align="">
          <a href="{{ route('all_mails_outgoing') }}" class="btn btn-light">
            <i class="fas fa-arrow-left"></i> &nbsp;
            Retour
          </a>
        </div>

        <div class="row">
          <div class="col-5">
            <h5 class="pb-20" style="border-bottom: 1px solid lightgray; padding-top: 15px; color: orange">
              Informations sur le courrier
            </h5>
              
            <div class="input-group mb-3">
              <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                <label for="courrier_id">Document</label>
              </div>
              <select name="courrier_id" class="form-control" id="courrier_id" required>
                <option value=""></option>
                <option value="{{ $courrier->id }}">{{ $courrier->attachment }}</option>
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
              <input type="text" disabled value="{{ $courrier->type_id }}" class="form-control" placeholder="" name="subject">
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
              <input type="text" disabled value="{{ $courrier->expeditor_id }}" class="form-control" placeholder="" name="subject">
            </div> 
            
            <div class="input-group mb-3">
              <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                <label for="">Service initiateur</label>
              </div>
              <input type="text" disabled value="{{ $courrier->service_dealing_id }}" class="form-control" placeholder="" name="subject">
            </div> 
            

          </div>

          <div class="col-7 fixed" id="viewer">
            
          </div>
        </div>
            <div class="row" style="padding: 50px 0 30px 0px">
              <div class="col"  align="">
                <a href="#" class="btn btn-secondary"> <i class="fas fa-pen"></i> Modifier</a> &nbsp; &nbsp;
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cotationModalCenter">
                  <i class="fas fa-share"></i>
                  Coter le courrier
                </button>&nbsp; &nbsp;
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalCenter">
                  <i class="fas fa-times"></i>
                  Supprimer
                </button>&nbsp; &nbsp;
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#archivedModalCenter">
                  <i class="fas fa-inbox"></i> Archiver
                </button> &nbsp; &nbsp;
              </div>
            </div>

            
            
            
          </div>
      </div>
    </div>
  </div>

  

  <!-- Modal -->
  <div class="modal fade" id="cotationModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Coter le courrier &nbsp;</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="#" method="POST" class="form">
          {{ csrf_field() }}
          <div class="modal-body">
            <div class="row">
              <div class="col-12 text-center" style="padding-bottom: 20px;">
                Veuillez selectionner le destinataire du courrier 
              </div>  
            </div>
            <div class="row">
              <div class="col-4" align="right">
                <p style="vertical-align: -webkit-baseline-middle;display: inline;">
                  Destinataire <i class="fas fa-user"></i>
                </p>
              </div>
              <div class="col-8" style="padding-bottom: 20px;">
                <select name="destinator" class="form-control" id="destinator">
                  <option value="" disabled>Expéditeur du courrier</option>
                  @foreach ($destinators as $item)
                    <option value="{{ $item->id }}">{{ $item->user->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>  
          </div>
          <div class="modal-footer">
            <div class="col text-center">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
              <button type="submit" class="btn btn-success">Valider</button>
            </div>
          </div>
        </form>
          
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="deleteModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Supprimer le courrier</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12 text-center" style="padding-bottom: 20px;">
              Êtes-vous sûre de vouloir supprimer ce courrier?
            </div>  
          </div>
        </div>
        <div class="modal-footer">
          <div class="col text-center">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuller</button>
            <a href="#" class="btn btn-danger">Supprimer</a>
          </div>
        </div>
          
      </div>
    </div>
  </div>
  
  <!-- Modal -->
  <div class="modal fade" id="archivedModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Archiver le courrier</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12 text-center" style="padding-bottom: 20px;">
              Vous êtes sur le point d'archiver le courrier "{{ $courrier->subject }}". 
              Souhaitez-vous confirmer l'opération ?
            </div>  
          </div>
        </div>
        <div class="modal-footer">
          <div class="col text-center">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuller</button>
            <a href="#" class="btn btn-success">Archiver</a>
          </div>
        </div>
          
      </div>
    </div>
  </div>

  
@endsection

@section('customJS')

<script src="{{ asset('webviewer/ui-legacy/external/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('webviewer/webviewer.js') }}" type="text/javascript"></script>

<script>
    WebViewer({
      // initialDoc: 'http://localhost:8000/doc/test.pdf',
      // initialDoc: ' ',
      // extension: 'pdf',
      showLocalFilePicker: true,
      path: 'http://localhost:8000/webviewer/',
      fullAPI: true,
    }, document.getElementById('viewer')).then(instance => {
      document.getElementById('courrier_id').onchange = function(e){
        // console.log('LeCourrier>>>>>>>>>>' ,e.target)
        var link = "/pieces_jointes/" + e.target.innerText;
        console.log(link)
        instance.loadDocument(link);
      }
    });

  </script>

  
@endsection