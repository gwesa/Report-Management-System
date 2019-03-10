<header>
  <nav class="navbar navbar-expand-md navbar-dark bg-light fixed-top" style="background-color: #2e38451c!important;">
      <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                نظام إدارة التقارير
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse col-lg-8 " >
                <ul class="navbar-nav mr-auto " >
                    <li class="nav-item"><a class="nav-link" href="{{route('home')}}"> الرئيسية </a></li>
                  @role(['Admin'])
                    <li class="nav-item"><a class="nav-link" href="{{route('user.index')}}"> إدارة المستخدمين  </a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('group.index')}}">المجموعات  </a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('admin.index')}}"> بياناتي </a></li>
                  @endrole
                    <li class="nav-item"><a class="nav-link" href="{{route('report.index')}}"> التقارير </a></li>
                    <li class="nav-item">
                      <a href="{{ route('logout') }}" class="nav-link"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                         تسجيل خروج
                     </a>
                    </li>
                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                   </form>
                </ul>
            </div>
      </div>
  </nav>
</header>
