<!DOCTYPE html>
<html lang="en">
<head>
  @include('../includes/head');
  <link rel="stylesheet" href="css/test/test.css">
  <!-- Animate.css -->
  <link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">
</head>

  <body class="login">

  <div>

    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class=" titulo-login">
        <h1 class="centrar-texto"><i class="fa fa-user-secret" aria-hidden="true"></i> Lorem Estudio</h1>
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
                  <label>
                    <input type="checkbox" name="remember"> Recordarme
                  </label>
                </div>
                <a class="" href="#">Olvidaste tu contraseña?</a>

              </div>
              <div class="separator">
                <p class="change_link">Nuevo usuario?
                  <a href="#signup" class="to_register"> Crear cuenta </a>
                </p>

                <div class="clearfix"></div>

              </div>

            </form>


          </section>
        </div>


      </div>
    </div>
  </body>
</html>