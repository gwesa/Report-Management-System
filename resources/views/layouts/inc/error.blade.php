
<!-- flash message -->
@if(session('message_success'))
    <div class=" alert alert-success flash_massage text-center" >
        <h5> {{ session('message_success') }}</h5>
    </div>
@elseif(session('message_fail'))
   <div class=" alert alert-danger flash_massage" >
        <h5> {{ session('message_fail') }}</h5>
  </div>
@endif

<!-- error message -->
@if(count($errors))
    <div class="alert alert-danger text-center">
        <ul>
            @foreach($errors->all() as $error)
              <p >
                  * {{$error}}
              </p>
            @endforeach
        </ul>
    </div>
@endif
