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
        <h4 class="text-center" style="padding: 10px;">Enregistrement d'un contact</h4> <hr>

        <form action="/contact/add" method="POST" class="form">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-6">
              <div align="right" style="padding-bottom: 20px">
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="customRadioInline1" name="entity_type" value="personal" class="custom-control-input" checked >
                  <label class="custom-control-label" for="customRadioInline1">Particulier</label>
                </div>
              </div>
              <div id="personal">
                <h6 style="border-bottom: 1px solid lightgray">Informations personnelle</h6>
                <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="first_name">Nom</label>
                  </div>
                    <input type="text" value="{{ old('first_name') }}" class="form-control" placeholder="Nom" name="first_name">
                  <div style="width: 100%; text-align: left; color: red">
                    <i style="font-size: 9px" >{{ $errors->first('first_name') }}</i> 
                  </div>
                </div>
                <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="last_name">Prénom</label>
                  </div>
                    <input type="text" value="{{ old('last_name') }}" class="form-control" placeholder="Prénom" name="last_name">
                  <div style="width: 100%; text-align: left; color: red">
                    <i style="font-size: 9px">{{ $errors->first('last_name') }}</i> 
                  </div>
                </div>
                <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="email">Email</label>
                  </div>
                    <input type="email" value="{{ old('email') }}" class="form-control" placeholder="Email" name="email">
                  <div style="width: 100%; text-align: left; color: red">
                    <i style="font-size: 9px">{{ $errors->first('email') }}</i> 
                  </div>
                </div>
              </div>

              {{-- Entreprise fields --}}
              <div id="enterprise">
                <h6 style="border-bottom: 1px solid lightgray;">Informations sur l'entreprise</h6>
                <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="company_name">Nom entreprise</label>
                  </div>
                    <input type="text" value="{{ old('company_name') }}" class="form-control" placeholder="Nom de l'entreprise" name="company_name">
                  <div style="width: 100%; text-align: left; color: red">
                    <i style="font-size: 9px" >{{ $errors->first('company_name') }}</i> 
                  </div>
                </div>
                <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="company_acronym">Sigle entreprise</label>
                  </div>
                    <input type="text" value="{{ old('company_acronym') }}" class="form-control" placeholder="Signe de l'entreprise" name="company_acronym">
                  <div style="width: 100%; text-align: left; color: red">
                    <i style="font-size: 9px">{{ $errors->first('company_acronym') }}</i> 
                  </div>
                </div>
                <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="company_email">Email entreprise</label>
                  </div>
                    <input type="email" value="{{ old('company_email') }}" class="form-control" placeholder="Email entreprise" name="company_email">
                  <div style="width: 100%; text-align: left; color: red">
                    <i style="font-size: 9px">{{ $errors->first('company_email') }}</i> 
                  </div>
                </div>
                <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="company_service">Service ciblé</label>
                  </div>
                    <input type="text" value="{{ old('company_service') }}" class="form-control" placeholder="Service ciblé" name="company_service">
                  <div style="width: 100%; text-align: left; color: red">
                    <i style="font-size: 9px">{{ $errors->first('company_service') }}</i> 
                  </div>
                </div>
              </div>
            </div>

            <div class="col-6">
              <div align="left" style="padding-bottom: 20px">
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="customRadioInline2" value="company" name="entity_type" class="custom-control-input">
                  <label class="custom-control-label" for="customRadioInline2">Personne morale</label>
                </div>
              </div>

              <h6 style="border-bottom: 1px solid lightgray">Contact</h6>
              <div class="input-group mb-3">
                <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                  <label for="address">Adresse</label>
                </div>
                  <input type="text" value="{{ old('address') }}" class="form-control" placeholder="Adresse" name="address">
                <div style="width: 100%; text-align: left; color: red">
                  <i style="font-size: 9px">{{ $errors->first('address') }}</i> 
                </div>
              </div>
              <div class="input-group mb-3">
                <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                  <label for="phone">Téléphone</label>
                </div>
                  <input type="text" value="{{ old('phone') }}" class="form-control" placeholder="Téléphone" name="phone">
                <div style="width: 100%; text-align: left; color: red">
                  <i style="font-size: 9px">{{ $errors->first('phone') }}</i> 
                </div>
              </div>
              <div class="input-group mb-3">
                <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                  <label for="postal_code">Code postal</label>
                </div>
                  <input type="text" value="{{ old('postal_code') }}" class="form-control" placeholder="Code postal" name="postal_code">
                <div style="width: 100%; text-align: left; color: red">
                  <i style="font-size: 9px">{{ $errors->first('postal_code') }}</i> 
                </div>
              </div>
            </div>


            </div>
            <div class="row" style="padding: 50px 0 30px 0px">
              <div class="col"  align="center">
                <a href="{{ route('contact') }}" class="btn btn-danger">Annuler</a> &nbsp; &nbsp;
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

    <script>
      function hideEnterprise(){
        $('#enterprise').toggle();
      }

      window.onload = hideEnterprise;

      $(function(){
        $("[name=entity_type]").click(function(){
          $('#enterprise').toggle();
          $('#personal').toggle();
        })
      })

      $('enterprise').show()
      $('#entity_type').on('change', function(){
        $('enterprise').show()
      })
      var checkbox = $('input[name="entity_type"]:checked').val();
      
      console.log("Checkbox>>>>>>>>>>>", checkbox)
    </script>
@endsection