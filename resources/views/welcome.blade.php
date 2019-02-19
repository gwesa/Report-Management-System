<!doctype html>
<html >
    <head>
        <meta charset="utf-8">
        <title>نظام إدارة التقارير</title>
        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
        <link href="{{asset('css/style.css?v=79' )}}" rel="stylesheet" type="text/css" >
    </head>
    <body dir="rtl">
      <div>
        <div class="bg-hehader">
          <div>
            <h3>نظام إدارة التقارير</h3>
          </div>
        </div>
      </div>
      <div >
        <div class='bg-welcome'>
          <div>
            <ul class="ul-welcome">
              <li>  تقاريرك متوفررة دائماً .  </li>
              <li>  تخزين أي ملف.  </li>
              <li>سرعة البحث و الوصول الى التقارير .  </li>
            </ul>
          </div>
          <div class="background-form">
           <div class="form">
             <h3> تسجيل الدخول </h3>
             <form method="POST" action="{{ route('login') }}">
                 @csrf
                 <div class="form-group row">
                     <label for="email" class="col-md-12 col-form-label text-md-right">الإيميل : </label>
                     <div class="col-md-12">
                         <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                         @if ($errors->has('email'))
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('email') }}</strong>
                             </span>
                         @endif
                     </div>
                 </div>

                 <div class="form-group row">
                     <label for="password" class="col-md-12 col-form-label text-md-right">كلمة المرور : </label>

                     <div class="col-md-12">
                         <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                         @if ($errors->has('password'))
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('password') }}</strong>
                             </span>
                         @endif
                     </div>
                 </div>
                 <div class="form-group row">

                 @if (Route::has('password.request'))
                     <a class=" col-md-12 col-form-label text-md-right " style="color:#368ACC"
                     href="{{ route('password.request') }}">
                         نسيت كلمة المرور
                     </a>
                 @endif
               </div>
                 <div class="form-group row ">
                     <div class="col-md-12 ">
                         <button type="submit" class="btn btn-block color-368ACC" style="margin-top:7%">
                            دخول
                         </button>
                     </div>
                 </div>
             </form>
           </div>

          </div>
        </div>
      </section>

      <footer class="footer" style="background-color:#f8f9fa;padding: 1% ;  text-align: center; overflow: hidden">
          نظام إداررة التقارير  ©
        </footer>
    </body>
</html>
