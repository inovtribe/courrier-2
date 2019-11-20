@extends('layouts.app')


@section('content')

<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-40 p-b-20">
        <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
          {{ csrf_field() }}
					<span class="login100-form-title p-b-40">
						GED  MINDDEVEL
					</span>
					<span class="login100-form-avatar">
						<img src="{{ asset('style_login/images/avatar-01.png') }}" alt="AVATAR">
					</span>
                    
					<div class="wrap-input100 validate-input m-t-50 m-b-35" data-validate = "Entrez votre email">
            <input id="email" type="email" class="input100" name="email" value="{{ old('email') }}" required autofocus>
            <span class="focus-input100" data-placeholder="email"></span>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
					</div>

					<div class="wrap-input100 validate-input m-b-20" data-validate="Enter password">
              <input id="password" type="password" class="input100" name="password" required>
              <span class="focus-input100" data-placeholder="Mot de passe"></span>
              @if ($errors->has('password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
          </div>
                    
          <div class="form-group">
              <div class="col-md-6 col-md-offset-4 p-l-0">
                  <div class="checkbox">
                      <label>
                          <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                      </label>
                  </div>
              </div>
          </div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Se connecter
						</button>
					</div>

					<ul class="login-more p-t-40" align="center">
						<li class="m-b-8">
							<span class="txt1">
                Mot de pass oublié ? 
							</span>

							<a href="{{ route('password.request') }}" class="txt2">
								Réinitialisé
              </a>
                
						</li>

						<li>
							<span class="txt1">
								Pas encore inscris ?
							</span>

							<a href="{{ route('register') }}" class="txt2">
                S'inscrire
							</a>
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>
	

    <div id="dropDownSelect1"></div>
    

@endsection
