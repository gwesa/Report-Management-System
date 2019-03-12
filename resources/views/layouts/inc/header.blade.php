<header>
  <nav class="navbar navbar-expand-md navbar-dark bg-light fixed-top" style="background-color: #2e38451c!important;">
      <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ __('main.app_name') }}
            </a>
            @auth
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse col-lg-8 " >
                  <ul class="navbar-nav mr-auto " >
                      <li class="nav-item"><a class="nav-link" href="{{route('home')}}">{{ __('main.home') }} </a></li>
                    @role(['Admin'])
                      <li class="nav-item"><a class="nav-link" href="{{route('user.index')}}"> {{ __('main.users') }} </a></li>
                      <li class="nav-item"><a class="nav-link" href="{{route('group.index')}}">{{ __('main.groups') }} </a></li>
                      <li class="nav-item"><a class="nav-link" href="{{route('admin.index')}}">{{ __('main.profile') }} </a></li>
                    @endrole
                      <li class="nav-item"><a class="nav-link" href="{{route('report.index')}}">{{ __('main.reports') }}  </a></li>
                      <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link"
                          onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                           {{ __('main.logout') }}
                       </a>
                      </li>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                     </form>
                  </ul>
                  <div class="mr-4 c185496">
                    <a href="{{ url('lang/en') }}" class="c185496" >{{ __('main.en') }} </a>
                    &nbsp | &nbsp
                    <a href="{{ url('lang/ar') }}" class="c185496">{{ __('main.ar') }}</a>
                </div>
              </div>
              @endauth
      </div>
  </nav>
</header>
