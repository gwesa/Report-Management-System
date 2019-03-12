@component('layouts.inc.basic_style')
  @section('title', __('group.edit'))

  @slot('subject')
     <b>{{ __('group.edit')}}: </b> {{$group->name}}
  @endslot

  <form action="{{route('group.update', [ $group->id ] )}}" method="post" class="contentForm" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
    <div class="form-group">
        <label> {{ __('main.name')}}  </label>
        <input type='text' name='name' class='form-control' value='{{$group->name}}'>
        <input type='hidden' name='id' class='form-control' value='{{$group->id}}'>
      </div>
      <button class="btn btn-sm  btn-info">{{ __('main.edit')}} </button>
  </form>

@endcomponent
