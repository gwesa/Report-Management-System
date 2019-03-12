
@component('layouts.inc.basic_style')
  @section('title',' تعديل بيانات مستخدم    ')

  @slot('subject')
  <b> {{ __('user.edit')}}: </b> {{$user->name}}
  @endslot

  <form action="{{route('user.update', [$user->id])}}" method="post" class="contentForm" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
    <div class="form-group">
        <label> {{ __('main.name')}} </label>
        <input type='text' name='name' class='form-control' value='{{$user->name}}' required>
    </div>
    <div class="form-group">
        <label>  {{ __('main.email')}} </label>
        <input type='email' name='email' class='form-control' value='{{$user->email}}' required>
    </div>
    <div class="form-group">
        <label>  {{ __('main.roles')}}</label>
          <div class="row">
            <div class="col-md-12">
                @foreach($roles as $role)
                    <div class="btn-group" role="group">
                        <label class="btn btn-default btn-checkbox">
                          {{$role->name}}  <input  name='roles[]' {{ $user->roles->contains($role->id) ? 'checked' : '' }} value='{{$role->id}}' type="checkbox" >
                        </label>
                    </div>
                @endforeach
                </div>
          </div>
    </div>
    <div class="form-group">
        <label>  {{ __('main.groups')}} </label>
        <div class="row">
          <div class="col-md-12">
              @foreach($groups as $group)
                  <div class="btn-group" role="group">
                      <label class="btn btn-default btn-checkbox">
                        {{$group->name}}  <input  name='groups[]'{{ $user->groups->contains($group->id) ? 'checked' : '' }}  value='{{$group->id}}' type="checkbox" >
                      </label>
                  </div>
              @endforeach
              </div>
        </div>
    </div>
      <button class="btn btn-block  btn-success"> {{ __('main.edit')}} </button>
  </form>

@endcomponent
