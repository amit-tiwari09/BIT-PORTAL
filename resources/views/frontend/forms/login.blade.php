@if (!auth()->guard('staff')->check() && !auth()->guard('student')->check())

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="{{asset('CSS/login.css')}}">
</head>

<body>

  <style>
    .alert {
      color: red;
      text-align: center;
    }

    .alert p {
      font-size: 12px;
    }

    .mrgn {
      margin-bottom: 32px;
    }
  </style>


  <a href="{{route('home')}}"><img src="{{ asset('pictures/' . $settings['logo']) }}" alt="Logo" style="width: 50px; height: 50px;"></a>

  <div class="wrapper">
    <div class="title-text">
      <div class="title login">Login as Staff</div>
      <div class="title signup">Login as Student</div>
    </div>

    <div class="form-container">
      <div class="slide-controls">
        <input type="radio" name="slide" id="login" checked>
        <input type="radio" name="slide" id="signup">
        <label for="login" class="slide login">Staff</label>
        <label for="signup" class="slide signup">Student</label>
        <div class="slider-tab"></div>
      </div>
      <div class="form-inner">

        <!--------- Staff login form ------------->
        <form action="{{route('staff.login')}}" method="POST" class="login">
          @csrf
          <div class="field mrgn">
            <input type="text" placeholder="Email Address" name="email" value="{{old('email')}}" required>
            @if ($errors->has('email'))
            <div class="alert">
              @foreach ($errors->get('email') as $error)
              <p>* {{ $error }}</p>
              @endforeach
            </div>
            @endif

            @if(session('UnvalidEmail'))
            <div class="alert">
              <p>* {{session('UnvalidEmail')}}</p>
            </div>
            @endif
          </div>

          <div class="field mrgn">
            <input type="password" placeholder="Password" name="pass" value="{{old('pass')}}" required>
            @if ($errors->has('pass'))
            <div class="alert">
              @foreach ($errors->get('pass') as $error)
              <p>* {{ $error }}</p>
              @endforeach
            </div>
            @endif

            @if(session('WrongPass'))
            <div class="alert">
              <p>* {{session('WrongPass')}}</p>
            </div>
            @endif
          </div>

          <div class="pass-link"><a href="#">Forgot password?</a></div>
          <div class="field btn">
            <div class="btn-layer"></div>
            <input type="submit" value="Login">
          </div>
          <div class="signup-link">Not a member? <a href="">Signup now</a></div>
        </form>

        <!------------ Student login form ------------>
        <form action="{{route('student.login')}}" method="POST" class="signup">
          @csrf
          <div class="field mrgn">
            <input type="text" placeholder="Email Address" name="email" value="{{old('email')}}" required>
            @if ($errors->has('email'))
            <div class="alert">
              @foreach ($errors->get('email') as $error)
              <p>* {{ $error }}</p>
              @endforeach
            </div>
            @endif
          </div>

          <div class="field mrgn">
            <input type="password" placeholder="Password" name="pass" value="{{old('pass')}}" required>
            @if ($errors->has('pass'))
            <div class="alert">
              @foreach ($errors->get('pass') as $error)
              <p>* {{ $error }}</p>
              @endforeach
            </div>
            @endif
          </div>

          @if(session('UnvalidEmail'))
          <div class="alert">
            <p>* {{session('UnvalidEmail')}}</p>
          </div>
          @endif

          @if(session('WrongPass'))
          <div class="alert">
            <p>* {{session('WrongPass')}}</p>
          </div>
          @endif

          <div class="field btn">
            <div class="btn-layer"></div>
            <input type="submit" value="Login">
          </div>
        </form>

      </div>
    </div>
  </div>

  <script src="{{asset('js/login.js')}}"></script>

  <style>
    #img {
      height: 200px;
      width: 200px;
    }
  </style>

</body>

</html>

@endif