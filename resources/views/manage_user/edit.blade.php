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
  <div class="container">
    <span class="mb-0 mt-6" id="infoAlert"></span>
    
    <div class="card card-small mb-4">
      <div class="card-body p-10 pb-3">
        <h4 class="text-center" style="padding: 10px;">Modifier profile</h4> <hr>

        <form action="/manage/users/{{ $profile->id }}/edit" method="POST" class="container" enctype="multipart/form-data">
          {{ csrf_field() }}
          {{ method_field('PATCH') }} 
          <div class="row">
            <div class="col-6">
              <div>
                <h6 style="border-bottom: 1px solid lightgray">Informations personnelle</h6>
                <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="username">Pseudo</label>
                  </div>
                    <input type="text" value="{{ old('username') ?? $profile->username }}" class="form-control" placeholder="Nom de profile" name="username">
                  <div style="width: 100%; text-align: left; color: red">
                    <i style="font-size: 9px">{{ $errors->first('username') }}</i> 
                  </div>
                </div>
                <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="first_name">Nom</label>
                  </div>
                    <input type="text" value="{{ old('first_name') ?? $profile->first_name }}" class="form-control" placeholder="Nom" name="first_name">
                  <div style="width: 100%; text-align: left; color: red">
                    <i style="font-size: 9px" >{{ $errors->first('first_name') }}</i> 
                  </div>
                </div>
                <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="last_name">Prénom</label>
                  </div>
                    <input type="text" value="{{ old('last_name') ?? $profile->last_name }}" class="form-control" placeholder="Prénom" name="last_name">
                  <div style="width: 100%; text-align: left; color: red">
                    <i style="font-size: 9px">{{ $errors->first('last_name') }}</i> 
                  </div>
                </div>
                <div class="input-group mb-3">
                  <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                    <label for="service_id">Service</label>
                  </div>
                  <select name="service_id" class="form-control" id="service_id">
                    @foreach ($services as $item)
                      <option {{ old('service_id', $profile->service_id) ==  $item->id ? 'selected' : ''  }} value="{{ $item->id }}" >{{ $item->name }}</option>
                    @endforeach
                  </select>
                  <div style="width: 100%; text-align: left; color: red">
                    <i style="font-size: 9px">{{ $errors->first('service_id') }}</i> 
                  </div>
                </div>
              </div>
            </div>

            <div class="col-6">
              <h6 style="border-bottom: 1px solid lightgray">Informations personnelle</h6>
              <div class="input-group mb-3">
                <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                  <label for="address">Adresse</label>
                </div>
                  <input type="text" value="{{ old('address') ?? $profile->address  }}" class="form-control" placeholder="Adresse" name="address">
                <div style="width: 100%; text-align: left; color: red">
                  <i style="font-size: 9px">{{ $errors->first('address') }}</i> 
                </div>
              </div>
              <div class="input-group mb-3">
                <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                  <label for="phone">Téléphone</label>
                </div>
                  <input type="text" value="{{ old('phone') ?? $profile->phone }}" class="form-control" placeholder="Téléphone" name="phone">
                <div style="width: 100%; text-align: left; color: red">
                  <i style="font-size: 9px">{{ $errors->first('phone') }}</i> 
                </div>
              </div>


              
              <div class="input-group mb-3">
                <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                  <label for="roles">Roles</label>
                </div>
                <select name="roles" class="form-control" id="roles">
                  @foreach ($roles as $item)
                    <option {{ old('roles', $profile->roles) ==  $item->key ? 'selected' : ''  }} value="{{ $item->key }}" >{{ $item->value }}</option>
                  @endforeach
                </select>
                <div style="width: 100%; text-align: left; color: red">
                  <i style="font-size: 9px">{{ $errors->first('roles') }}</i> 
                </div>
              </div>


              <div class="input-group mb-3">
                <div class="" style="padding-left: 0px; padding-top: 5px; width: 100%; text-align: left">
                  <label for="visa_path">Signature</label>
                </div>
                  <input type="file" value="" class="form-control" placeholder="" name="visa_path" accept="image/*" >
                <div style="width: 100%; text-align: left; color: red">
                  <i style="font-size: 9px">{{ $errors->first('visa') }}</i> 
                </div>
              </div>
            </div>
          </div>

          <div class="row" style="padding: 50px 0 30px 0px">
            <div class="col"  align="center">
              <a href="{{ route('manage_user_list') }}" class="btn btn-danger">Annuler</a> &nbsp; &nbsp;
              <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </div>
          </div>
        </form>


        </div>
      </div>
    </div>
  </div>


@endsection
