<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{active_class(if_route('topics.index'))}}"><a class="nav-link"
                            href="{{route('topics.index')}}">Topics</a></li>
                    <li
                        class="nav-item  {{active_class(if_route('categories.topics') && if_route_param('category',1))}}">
                        <a class="nav-link" href="{{route('categories.topics',1)}}">Share</a></li>
                    <li
                        class="nav-item  {{active_class(if_route('categories.topics') && if_route_param('category',2))}}">
                        <a class="nav-link" href="{{route('categories.topics',2)}}">Course</a></li>
                    <li
                        class="nav-item  {{active_class(if_route('categories.topics') && if_route_param('category',3))}}">
                        <a class="nav-link" href="{{route('categories.topics',3)}}">Q&A</a></li>
                    <li
                        class="nav-item  {{active_class(if_route('categories.topics') && if_route_param('category',4))}}">
                        <a class="nav-link" href="{{route('categories.topics',4)}}">Annoucement</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item">
                        <a href="{{route('topics.create')}}" class="nav-link">
                            <i class="fas fa-plus"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('notifications.index')}}" class="nav-link">
                            <span class="badge badge-{{Auth::user()->notification_count>0?'danger':'light'}}">
                                {{Auth::user()->notification_count}}
                            </span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img src="{{Auth::user()->avatar}}" alt="avatar" style="height:32px;">

                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('users.show',Auth::user())}}">
                                <i class="fas fa-user mr-2"></i>
                                Profile Center</a>
                            <a class="dropdown-item" href="{{route('users.edit',Auth::user())}}">
                                <i class="fas fa-edit mr-2"></i>Edit Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt mr-2"></i>
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