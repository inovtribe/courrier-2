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
        <h4 class="text-center" style="padding: 10px;">{{ $courrier->subject }}</h4> <hr>
        <div class="col pl-0"  align="">
          <a href="{{ route('valid_mails_arrived') }}" class="btn btn-light">
            <i class="fas fa-arrow-left"></i> &nbsp;
            Retour
          </a>
        </div>
        
        <div class="row">
          <div class="col-5 pl-50px">
            <h5 class="pb-20" style="border-bottom: 1px solid lightgray; padding-top: 15px; color: orange">
              Informations sur le courrier
            </h5>
              
            <div class="input-group mb-3">
              <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                <label for="selected_file">Document</label>
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
            
            {{-- <div class="input-group mb-3">
              <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                <label for="">Service initiateur</label>
              </div>
              <input type="text" disabled value="{{ $courrier->service_dealing_id }}" class="form-control" placeholder="" name="subject">
            </div>             --}}

          </div>

          <div class="col-7 fixed" id="viewer">
            
          </div>
        </div>

        <div class="row" style="padding: 50px 0 30px 0px">
          <div class="col"  align="">
            <div class="col-3 pl-0">
                <div class="btn-group">
                    <button class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true", aria-expanded="false">
                        <i class="fas fa-share"></i> 
                        Coter le courrier
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" data-toggle="modal" data-target="#cotationServiceModalCenter">
                          A un service
                        </a>
                        <a class="dropdown-item" data-toggle="modal" data-target="#cotationPersonModalCenter">
                          A une personne
                        </a>
                        {{-- <a class="dropdown-item" data-toggle="modal" data-target="#cotationGroupModalCenter">
                          A un groupe de personne
                        </a> --}}
                      {{-- <a href="/courrier/single/{{ $item->id }}/delete" class="dropdown-item">
                        A une personne
                      </a>
                      <a href="/courrier/single/{{ $item->id }}/delete" class="dropdown-item">
                        A un groupe personne
                      </a> --}}
                    </div>
                  </div>
            </div>
            {{-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cotationModalCenter">
              <i class="fas fa-share"></i>
              A un service
            </button>&nbsp; &nbsp; --}}
          </div>
        </div>
            
      </div>
    </div>
  </div>



<div class="modal fade" id="cotationServiceModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Coter le courrier &nbsp;</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/courrier/single/{{ $courrier->id }}/forward" method="POST" class="form">
          {{ csrf_field() }}
          {{ method_field('PATCH') }}
          <div class="modal-body">
            <div class="row">
              <div class="col-12 text-center" style="padding-bottom: 20px;">
                Veuillez selectionner le service de destination du courrier 
              </div>  
            </div>
            <div class="row">
              <div class="col-4" align="right">
                <p style="vertical-align: -webkit-baseline-middle;display: inline;">
                  Service <i class="fas fa-cog"></i>
                </p>
              </div>
              <div class="col-8" style="padding-bottom: 20px;">
                <select name="service_dealing_id" class="form-control">
                  <option value=""></option>
                  @foreach ($services as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                  @endforeach
                </select>
              </div>
            </div> 
          </div>
          <div class="modal-footer">
            <div class="col text-center">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuller</button>
              <button type="submit" class="btn btn-success">Valider</button>
            </div>
          </div>
        </form>
          
      </div>
    </div>
  </div>


<!-- Modal -->
<div class="modal fade" id="cotationPersonModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Coter le courrier &nbsp;</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/courrier/single/{{ $courrier->id }}/forward" method="POST" class="form">
          {{ csrf_field() }}
          {{ method_field('PATCH') }}
          <div class="modal-body">
            <div class="row">
              <div class="col-12 text-center" style="padding-bottom: 20px;">
                Veuillez selectionner le destinataire du courrier 
              </div>  
            </div>
            <div class="row">
              <div class="col-4" align="right">
                <p style="vertical-align: -webkit-baseline-middle;display: inline;">
                  Service <i class="fas fa-cog"></i>
                </p>
              </div>
              <div class="col-8" style="padding-bottom: 20px;">
                <select name="service_dealing_id" class="form-control" id="service" onchange="myFunction(this)">
                  <option value=""></option>
                  @foreach ($services as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-4" align="right">
                <p style="vertical-align: -webkit-baseline-middle;display: inline;">
                  Destinataire <i class="fas fa-user"></i>
                </p>
              </div>
              <div class="col-8" style="padding-bottom: 20px;">
                <select name="destinator_id" class="form-control" id="emptyDropdown">
                  <option value="" ></option>
                </select>
              </div>
            </div>    
          </div>
          <div class="modal-footer">
            <div class="col text-center">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuller</button>
              <button type="submit" class="btn btn-success">Valider</button>
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

  function myFunction(obj)
  {
    $('#emptyDropdown').empty()
    var dropDown = document.getElementById("service");
    var service_id = dropDown.options[dropDown.selectedIndex].value;
    console.log("id", service_id)
    $.ajax({
            type: "GET",
            url: `/api/profiles/${service_id}/all` ,
            success: function(data){
                // Parse the returned json data
                var opts = $.parseJSON(data);
                // Use jQuery's each to iterate over the opts value
                $.each(opts, function(i, d) {
                    // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                    $('#emptyDropdown').append('<option value="' + d.id + '">' + d.username + '</option>');
                });
            }
        });
  }

  </script>

  
@endsection