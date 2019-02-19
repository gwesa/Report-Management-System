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
                    <li class="nav-item"><a class="nav-link" href=""> إدارة المستخدمين  </a></li>
                    <li class="nav-item"><a class="nav-link" href=""> التقارير </a></li>
                    <li class="nav-item"><a class="nav-link" href=""> الصلاحيات </a></li>
                    <li class="nav-item"><a class="nav-link" href="">المجموعات  </a></li>
                    <li class="nav-item"><a class="nav-link" href=""> الاقسام </a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('admin.index')}}"> بياناتي </a></li>
                </ul>
            </div>
      </div>
  </nav>
</header>
