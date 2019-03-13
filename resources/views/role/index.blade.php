@component('layouts.inc.basic_style')
  @section('title', __('main.roles'))
  @slot('subject')
    {{ __('main.roles') }}
  @endslot
  <label> {{ __('role.available roles') }} : </label>
  @foreach($roles as $role)
    <form method="post" action="{{ route('role.update', [ $role->id]) }}" class="dis-inline">
      @csrf
      @method('PATCH')
        <div class="btn-group" role="group">
          <label class="btn btn-default btn-checkbox {{$role->active ? '' : 'not-active'}}"  >
              {{$role->name}} <input  name='active'  type="checkbox"
               onchange="this.form.submit()" {{$role->active ? 'checked' : ''}}>
          </label>
        </div>
    </form>
@endforeach
@endcomponent
