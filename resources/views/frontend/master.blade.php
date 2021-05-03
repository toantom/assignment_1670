<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Heroic Features - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="{{URL::asset('public/frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="{{URL::asset('public/frontend/css/heroic-features.css')}}" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" @if (Auth::guard('student'))
          href="{{route('frontend.indexStudent')}}"
      @else
        href="{{route('frontend.indexTeacher')}}"
      @endif>Greenwich University</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <div class="dropdown open">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">
                    Welcome
                      @if (Auth::guard('student')->check())
                        {{Auth::guard('student')->user()->name}}
                      @else
                        {{Auth::guard('teacher')->user()->name}}
                      @endif
              </button>
              <div class="dropdown-menu" aria-labelledby="triggerId">
                <a class="dropdown-item" @if (Auth::guard('student')->check())
                  href="{{route('frontend.inforStudent', Auth::guard('student')->user()->id)}}"
                @else
                  href="{{route('frontend.inforTeacher', Auth::guard('teacher')->user()->id)}}"
                @endif>Information</a>
                <a onclick="return confirm('Are you sure to logout?')" href="{{route('frontend.logout')}}" class="dropdown-item" style="color: red">Logout</a>

              </div>
            </div>
          </li>
          <li class="nav-item">
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    @yield('main')

  </div>
  <!-- /.container -->

  {{-- <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer> --}}

  <!-- Bootstrap core JavaScript -->
  <script src="{{URL::asset('public/frontend/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{URL::asset('public/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>
