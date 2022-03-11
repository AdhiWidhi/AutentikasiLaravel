    <nav class="navbar navbar-expand-lg {{ \App\Helpers\Navbar::NavbarColor() }}">
        <div class="container">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <ul class="navbar-nav ms-auto">
                  <li class="nav-item"><a href="#" class="nav-link">Home</a></li>
                  @if(Auth::check())
                  @if(Auth::user()->roleAdmin())
                  <li class="nav-item"><a href="#" class="nav-link">admin</a></li>
                  @endif
                  @if(Auth::user()->roleUser())
                  <li class="nav-item"><a href="#" class="nav-link">User</a></li>
                  @endif
                  @if(Auth::user()->roleStudent())
                  <li class="nav-item"><a href="#" class="nav-link">Student</a></li>
                  @endif
                  @endif
              </ul>
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
