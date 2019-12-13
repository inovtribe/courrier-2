@extends('layouts.base')

@section('content')

  <div class="container">
      <div class="col">
          <div class="card card-small mt-4 p-4 mb-4"> 
            <h3 class="text-center">Décharge courrier</h3>
            <div class="offset-md-2 col-md-8" style="padding-top: 20px; line-height: 150%" id="decharge">
              <p style="margin-bottom: 250px; display:none;">
                  REPUBLIQUE DU CAMEROUN <br />
                  Paix - Travail - Patrie <br />
                  MINISTERE DE LA DECENTRALISATION <br>ET DU DEVELOPPEMENT LOCAL <br />
              </p>
              <p>
                MINDEVEL/SDACL/M. <b>{{ $single_courrier->createdBy->first_name.' '.$single_courrier->createdBy->last_name }}</b> accuse reception du courrier: 
              </p>
              <p style="line-height: 180%">
                Courrier ref: {{ $single_courrier->reference }} <br />
                Objet: {{ $single_courrier->subject }} <br />
                Déposé le: {{ $single_courrier->mail_date_arrived->format('d/m/Y') }} <br />
                @if ($single_courrier->expeditor->first_name)
                  Par:{{ ' '.$single_courrier->expeditor->first_name.' '.$single_courrier->expeditor->last_name }} 
                @else
                  Par: {{ $single_courrier->expeditor->company_name }} 
                @endif
                
              </p>
            </div>
            <div class="offset-md-2 col-md-8">
                <p>
                  <a href="{{ route('all_mails_arrived') }}" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i>
                    Liste des courriers
                  </a> &nbsp; &nbsp;
                  <button class="btn btn-outline-secondary" data-toggle="modal" data-target="#previewModalCenter" id="prevPdf">
                    <i class="fa fa-print"></i>
                    Imprimer
                  </button>
                </p>
            </div>
          </div>
      </div>
  </div>


  <!-- Modal -->
<div class="modal fade" id="previewModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Prévisualisation de la décharge</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="prevContainer" id="preview" style="height: 500px">

        </div>
        
          
      </div>
    </div>
  </div>

@endsection

@section('customJS')
  <script src="{{ asset('webviewer/ui-legacy/external/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('webviewer/webviewer.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/jspdf.debug.js') }}" type="text/javascript"></script>
    
  <script>
    var content = $("#decharge").html();
    console.log("Decharge", content);

    $('#prevPdf').click(function () {
      var doc = new jsPDF('p', 'pt', 'A4');

      margins = {
        top: 50,
        bottom: 60,
        left: 50,
        right: 20,
        width: 490
      }

      var source = $("#decharge").html();

      var specialElementHandlers = {
        '#preview': function (element, renderer) {
            return true;
        }
    }
    
    doc.fromHTML(source, margins.left, margins.top, {
        'width': margins.width,
        'elementHandlers': specialElementHandlers
    });

    var string = doc.output('datauristring');


    WebViewer({
      initialDoc: string,
      // initialDoc: ' ',
      // extension: 'pdf',
      showLocalFilePicker: true,
      path: 'http://localhost:8000/webviewer/',
      fullAPI: true,
      }, document.getElementById('preview')).then(instance => {
        instance.loadDocument(initialDoc);
      });  
    });
  </script>    
@endsection
