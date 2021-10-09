<nav class="navbar-expand-md bg-primary h-100 sidebar">
    <div class="container">
        <div class="row">
            <div class="col-md-12 py-4 text-center">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h3 class="text-white">{{ env('APP_NAME', 'Business Website') }}</h3>
                </a>
            </div>
        </div>

        <div class="collapse navbar-collapse">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav mr-auto flex-column">
                <!-- Authentication Links -->
                @guest
                @if (Route::has('login'))
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                <li class="nav-item <?php if($active_menu == 'users') { echo 'menu-active';} else {echo  '';} ?>">
                    <a class="nav-link" href="{{ route('users') }}">Users</a>
                </li>
                <li class="nav-item <?php if($active_menu == 'abouts') { echo 'menu-active';} else {echo  '';} ?>">
                    <a class="nav-link" href="{{ route('abouts') }}">About Us</a>
                </li>
                <li class="nav-item <?php if($active_menu == 'skills') { echo 'menu-active';} else {echo  '';} ?>">
                    <a class="nav-link" href="{{ route('skills_list') }}">Skills</a>
                </li>
                <li
                    class="nav-item <?php if($active_menu == 'testimonials') { echo 'menu-active';} else {echo  '';} ?>">
                    <a class="nav-link" href="{{ route('testimonials') }}">Testimonials</a>
                </li>
                <li class="nav-item <?php if($active_menu == 'contact') { echo 'menu-active';} else {echo  '';} ?>">
                    <a class="nav-link" href="{{ route('contact') }}">Contacts</a>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>