@component('layouts.inc.basic_style')
  @section('title',__('main.profile') )

  @slot('subject')
   {{ __('main.edit')}}
  @endslot
    <form action="{{route('profile.update',[ Auth::user()->id ])}}" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="usr">{{ __('main.email')}} </label>
          <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}" required>
        </div>
        <div class="form-group">
          <label for="pwd">{{ __('main.pass')}} </label>
          <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-info  btn-md">{{ __('main.edit')}}</button>
    </form>

@endcomponent
