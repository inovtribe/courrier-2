@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="container">
            <div class="" style="padding: 20px; background-color:#74b5ec; color: white; margin-top: 50px; border-radius: 15px">

                <div class="">
                    <form class="row" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }} 
                        <div class="col-md-6 col-lg-6 col-xs-12">
                            <h4 class="text-center">Information de connexion</h4><hr>
                            <div class="col-12">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Pseudo</label>
        
                                    <div class="col-md-12">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
        
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">Addresse E-Mail</label>
    
                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
    
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-12">
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-12 control-label">Mot de passe</label>
    
                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control" name="password" required>
    
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-12 control-label">Confirmation mot de passe</label>
    
                                    <div class="col-md-12">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>
                            </div>
    
                        </div>
                        
                        <div class="col-md-6 col-lg-6 col-xs-12">
                            <h4 class="text-center">Informations personnelles</h4><hr>
                            <div class="col-12">
                                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                    <label for="first_name" class="col-md-4 control-label">Nom</label>
        
                                    <div class="col-md-12">
                                        <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>
        
                                        @if ($errors->has('first_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                    <label for="last_name" class="col-md-4 control-label">Prénom</label>
        
                                    <div class="col-md-12">
                                        <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>
        
                                        @if ($errors->has('last_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label for="phone" class="col-md-4 control-label">Téléphone</label>
        
                                    <div class="col-md-12">
                                        <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>
        
                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                    <label for="address" class="col-md-4 control-label">Adresse</label>
        
                                    <div class="col-md-12">
                                        <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required autofocus>
        
                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>    
                        </div>  

                        <div class="row" style="width: 100%">
                            <div class="col-12">
                                <button type="submit" class="btn btn-light mx-auto" style="display: block; margin-top: 50px; padding-left:20px; padding-right:20px">
                                    Enregistrer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
