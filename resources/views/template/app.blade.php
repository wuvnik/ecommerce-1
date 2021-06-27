<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>things.com</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('template/vendor/bootstrap/css/bootstrap.min.css') }}">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/templatemo-sixteen.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/owl.css') }}">

    <!--font awesome icon -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

</head>
<body>
    
    <!-- Header -->
    <header class="x">
            <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}"><h2><em>things</em>.com</h2></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Log In</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @else
                        @if (Auth::user()->hasRole('user'))
                            <!-- Cart/Basket -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cart.index') }}">Cart</a>
                            </li>
                        @endif
                            <!-- Vendor -->
                        @if (Auth::user()->hasRole('vendor'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('vendor.index') }}">Manage</a>
                            </li>
                        @endif
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
                </div>
            </div>
            </nav>
    </header>
    {{-- @include('template.banner') --}}
    {{-- <div class="call-to-action"> --}}
        {{-- <div class="container pt-5"> --}}
          {{-- <div class="row"> --}}
            {{-- <div class="col-md-12"> --}}
              {{-- <div class=""> --}}
                {{-- <div class="row"> --}}

                    @yield('content')

                {{-- </div> --}}
              {{-- </div> --}}
            {{-- </div> --}}
          {{-- </div> --}}
        {{-- </div> --}}
      {{-- </div> --}}


    <footer>
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="inner-content">
                    <p>Copyright &copy; 2021
                
                - Design: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
                </div>
                </div>
            </div>
            </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Additional Scripts -->
    <script src="{{ asset('template/assets/js/custom.js') }}"></script>
    <script src="{{ asset('template/assets/js/owl.js') }}"></script>
    <script src="{{ asset('template/assets/js/slick.js') }}"></script>
    <script src="{{ asset('template/assets/js/isotope.js') }}"></script>
    <script src="{{ asset('template/assets/js/accordions.js') }}"></script>

    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>

</body>
</html>