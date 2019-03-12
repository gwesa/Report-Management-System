
@component('layouts.inc.basic_style')
  @section('title', __('user.add'))

  @slot('subject')
  {{ __('user.add')}}
  @endslot

  <form action="{{route('user.store')}}" method="post" class="contentForm" enctype="multipart/form-data">
      @csrf
    <div class="form-group">
        <label> {{ __('main.name')}}</label>
        <input type='text' name='name' class='form-control' value='{{old('name') }}' required>
    </div>
    <div class="form-group">
        <label>{{ __('main.email')}} </label>
        <input type='email' name='email' class='form-control' value='{{old('email') }}' required>
    </div>
    <div class="form-group">
        <label> {{ __('main.pass')}} </label>
        <input type='password' name='password' class='form-control'  required>
    </div>
    <div class="form-group">
        <label>  {{ __('main.password confirmation')}}</label>
        <input type='password' name='password_confirmation' class='form-control' required>
    </div>
    <div class="form-group">
        <label> {{ __('main.roles')}} </label>
          <div class="row">
            <div class="col-md-12">
                @foreach($roles as $role)
                    <div class="btn-group" role="group">
                        <label class="btn btn-default btn-checkbox">
                          {{$role->name}}  <input  name='roles[]' value='{{$role->id}}' type="checkbox" >
                        </label>
                    </div>
                @endforeach
                </div>
          </div>
    </div>
    <div class="form-group">
        <label>{{ __('main.groups')}} </label>
        <div class="row">
          <div class="col-md-12">
              @foreach($groups as $group)
                  <div class="btn-group" role="group">
                      <label class="btn btn-default btn-checkbox">
                        {{$group->name}}  <input  name='groups[]' value='{{$group->id}}' type="checkbox" >
                      </label>
                  </div>
              @endforeach
              </div>
        </div>
    </div>
      <button class="btn btn-block  btn-success">{{ __('main.add')}} </button>
  </form>

@endcomponent
