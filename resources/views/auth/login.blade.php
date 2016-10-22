<!DOCTYPE html>
<html lang="en">
<head>
  {{-- Metatags, js para IE8, css, title --}}
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta name="_token" content="{!! csrf_token() !!}"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

{{-- Estilo general del sitio --}}
@include('assets/styles')

  <title>Login - Judici</title>

</head>

  <body class="login">

  <div>

    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class=" titulo-login">
        <h1 class="centrar-texto"><i class="fa fa-user-secret" aria-hidden="true"></i> Judici</h1>
      </div>
      <div class="animate form login_form">

          <section class="login_content">

            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">

              {{ csrf_field() }}

              <h1>Ingresar</h1>
              <div class="form-group">
                <input id="username" type="text" class="form-control"  name="username" placeholder="Usuario" value="{{ old('username') }}">
                @if ($errors->has('username'))
                  <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                  </span>
                @endif
              </div>

              <div class="form-group{{ $errors->has('password') || $errors->has('username') ? ' has-error' : '' }}">
                <input id="password" type="password" class="form-control" name="password" placeholder="Password" />
                @if ($errors->has('password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
              </div>

              <div class="form-group">
                <div class="checkbox">
                  <button type="submit" class="btn btn-dark submit">
                    <i class="fa fa-btn fa-sign-in"></i> Ingresar
                  </button>
                  <label class="remember">
                    <input type="checkbox" name="remember"> Recordarme
                  </label>
                </div>
              </div>

              <div class="separator">
                <div class="clearfix"></div>
              </div>
              <a class="" href="#">Olvidaste tu contraseña?</a>
            </form>

          </section>
        </div>


      </div>
    </div>
  </body>
</html>