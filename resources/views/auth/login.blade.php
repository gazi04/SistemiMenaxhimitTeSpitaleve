<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=0"
    />
    <link
      rel="shortcut icon"
      type="image/x-icon"
      href="{{ asset('assets/img/favicon.ico') }}"
    />
    <title>Hospital Login</title>
    <link
      rel="stylesheet"
      type="text/css"
      href="{{ asset('assets/css/bootstrap.min.css') }}"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="{{ asset('assets/css/font-awesome.min.css') }}"
    />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.min.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="main-wrapper account-wrapper">
      <div class="account-page">
        <div class="account-center">
          <div class="account-box">
            <form
            {{--#TODO: need to fix the action attribute--}}
              action="{{ route('login') }}"
              method="POST"
              class="form-signin"
            >
            @csrf
              <div class="account-logo">
                <img
                  src="assets/img/logo-dark.png"
                  alt="Hospital Logo"
                  draggable="false"
                />
              </div>

              <div class="form-group">
                <label for="id_number">ID Number:</label>
                <input
                  type="text"
                  name="id_number"
                  id="id_number"
                  class="form-control"
                  required
                  autofocus
                />
              </div>

              <div class="form-group">
                <label for="personal_id">Personal ID</label>
                <input
                  type="password"
                  name="personal_id"
                  id="personal_id"
                  class="form-control"
                  required
                />
              </div>

              <div class="form-group text-right">
                <a href=""
                  >Forgot your password?</a
                >
              </div>

              <div class="form-group text-center">
                <input
                  type="submit"
                  value="Login"
                  class="btn btn-primary account-btn"
                />
              </div>

              <!-- Uncomment if you want a registration link -->
              <!-- <div class="text-center register-link">
                Dont have an account? <a href="{ route('register') }}">Register now</a>
              </div> -->
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
  </body>
</html>
