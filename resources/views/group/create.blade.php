@component('layouts.inc.basic_style')
  @section('title','إضافة مجموعة  ')

  @slot('subject')
    إضافة مجموعة جديدة
  @endslot

  <form action="{{route('group.store')}}" method="post" class="contentForm" enctype="multipart/form-data">
      @csrf
    <div class="form-group">
        <label> اسم المجموعة : </label>
        <input type='text' name='name' class='form-control' value='{{old('name') }}'>
      </div>
      <button class="btn btn-sm  btn-success">إضافة</button>
  </form>

@endcomponent
