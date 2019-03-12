@component('layouts.inc.basic_style')
  @section('title',__('group.add'))

  @slot('subject')
    {{ __('group.add')}}
  @endslot

  <form action="{{route('group.store')}}" method="post" class="contentForm" enctype="multipart/form-data">
      @csrf
    <div class="form-group">
        <label> {{ __('group.name')}} </label>
        <input type='text' name='name' class='form-control' value='{{old('name') }}'>
      </div>
      <button class="btn btn-sm  btn-success">{{ __('main.add')}}</button>
  </form>

@endcomponent
