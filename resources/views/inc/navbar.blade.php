{{-- <div class="p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm sticky-top">
  <div class="container d-flex flex-column flex-md-row align-items-center">
    <h5 class="my-0 mr-md-auto font-weight-normal">
      <a class="text-info text-decoration-none" href="/">{{config('app.name', 'LSAPP')}}</a>
    </h5>
    <nav class="my-2 my-md-0 mr-md-3">
      <a class="p-2 text-dark text-decoration-none" href="/"><i class="fas fa-home"></i> Home</a>
      <a class="p-2 text-dark text-decoration-none" href="/about"><i class="fas fa-address-card"></i> About</a>
      <a class="p-2 text-dark text-decoration-none" href="/services"><i class="fab fa-servicestack"></i> Services</a>
      <a class="p-2 text-dark text-decoration-none" href="/posts"><i class="fas fa-blog"></i> Blog Posts</a>
      <a class="p-2 text-dark text-decoration-none" href="/contact"><i class="fas fa-id-card-alt"></i> Contact</a>
    </nav>
    <a class="btn btn-info" href="/posts/create"><i class="fas fa-plus"></i> Create Post</a>
  </div>
</div> --}}



<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">
  <div class="container">
      <a class="navbar-brand text-info" href="{{ url('/') }}">
          {{ config('app.name', 'Laravel') }}
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">

          </ul>

          <ul class="nav nav-bar-nav navbar-right mr-5">
            <li><a class="p-2 text-dark text-decoration-none" href="/"><i class="fas fa-home"></i> Home</a></li>
            <li><a class="p-2 text-dark text-decoration-none" href="/about"><i class="fas fa-address-card"></i> About</a></li>
            <li> <a class="p-2 text-dark text-decoration-none" href="/services"><i class="fab fa-servicestack"></i> Services</a></li>
            <li><a class="p-2 text-dark text-decoration-none" href="/posts"><i class="fas fa-blog"></i> Blog Posts</a></li>
            <li><a class="p-2 text-dark text-decoration-none" href="/contact"><i class="fas fa-id-card-alt"></i> Contact</a></li>
          </ul>

          <!-- Right Side Of Navbar => ml-auto -->
          <ul class="navbar-nav">
              <!-- Authentication Links -->
              @guest
                  <li class="nav-item">
                      <a class="nav-link btn btn-outline-info px-3 mr-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link btn btn-info px-3 text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                  @endif
              @else
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/home"><i class="fas fa-home mr-2"></i> Home</a>
                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();"> <i class="fas fa-sign-out-alt mr-2"></i>
                              {{ __('Logout') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </div>
                  </li>
              @endguest
          </ul>
      </div>
  </div>
</nav>