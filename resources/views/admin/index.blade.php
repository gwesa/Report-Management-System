@component('layouts.inc.basic_style')
  @section('title','الملف الشخصي ')

  @slot('subject')
    تعديل البيانات
  @endslot
    <form action="{{route('admin.update',[ Auth::user()->id ])}}" method="post">
        {{ csrf_field() }}
        @method('PATCH')
        <div class="form-group">
          <label for="usr">الايميل </label>
          <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}" required>
        </div>
        <div class="form-group">
          <label for="pwd">كلمة المرور</label>
          <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-info  btn-md">تعديل</button>
    </form>

@endcomponent
