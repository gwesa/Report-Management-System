@component('layouts.inc.basic_style')
  @section('title','تعديل مجموعة')

  @slot('subject')
     تعديل المجموعة {{$group->name}}
  @endslot

  <form action="{{route('group.update', [ $group->id ] )}}" method="post" class="contentForm" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
    <div class="form-group">
        <label> اسم المجموعة : </label>
        <input type='text' name='name' class='form-control' value='{{$group->name}}'>
        <input type='hidden' name='id' class='form-control' value='{{$group->id}}'>
      </div>
      <button class="btn btn-sm  btn-info">تعديل</button>
  </form>

@endcomponent
