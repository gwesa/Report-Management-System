
@if(count($errors))
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
              <p style="text-align: center">
                  * {{$error}}
              </p>
            @endforeach
        </ul>
    </div>
@endif
