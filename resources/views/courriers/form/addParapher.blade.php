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
        <h4 class="text-center" style="padding: 10px;">Création de parapheur</h4> <hr>

        <form action="/parapheur/{{ $courrier->id }}/add" method="POST" class="form" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="row" style="height: 100vh">
            <div class="col-5">
              <h5 class="pb-20" style="border-bottom: 1px solid lightgray; padding-top: 15px; color: orange">Nouveau parapheur</h5>
                
              <div class="input-group mb-3">
                <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                  <label for="courrier_id">Courrier</label>
                </div>
                <select name="courrier_id" class="form-control" id="courrier_id" required>
                  <option value=""></option>
                  <option value="{{ $courrier->id }}">{{ $courrier->attachment }}</option>
                </select>
              </div>

              <div class="input-group mb-3">
                <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                  <label for="">Titre du parapheur</label>
                </div>
                  <input type="text" value="{{ old('parapher_title') }}" class="form-control" placeholder="Titre du parapheur" name="parapher_title">
                <div style="width: 100%; text-align: left; color: red">
                  <i style="font-size: 9px">{{ $errors->first('parapher_title') }}</i> 
                </div>
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
                <div style="width: 100%; text-align: left; color: red">
                  <i style="font-size: 9px">{{ $errors->first('initiate_service') }}</i> 
                </div>
              </div>

              {{-- <div class="input-group mb-3" style="text-align: left; padding-left: 0px">
                <div class="col" style="padding-left: 0px">
                  <label for="">Coforme</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="customRadioInline1" value=true name="conformity" class="custom-control-input">
                  <label class="custom-control-label" for="customRadioInline1">Oui</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="customRadioInline2" value=false name="conformity" class="custom-control-input" checked>
                  <label class="custom-control-label" for="customRadioInline2">Non</label>
                </div>
              </div> --}}

            </div>

            <div class="col-7 fixed" id="viewer">
              
            </div>
          </div>
            <div class="row" style="padding: 50px 0 30px 0px">
              <div class="col"  align="">
                <a href="{{ route('all_mails') }}" class="btn btn-danger">Annuler</a> &nbsp; &nbsp;
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Enregistrer</button>
              </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Lorsque vous auriez valider ce formulaire, le parapheur sera envoyé au responsable SDACL
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuller</button>
                    <button type="submit" class="btn btn-primary">Confirmer</button>
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