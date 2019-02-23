
@component('layouts.inc.basic_style')
  @section('title','مستخدم جديد   ')

  @slot('subject')
    إضافة مستخدم جديد
  @endslot

  <form action="{{route('user.store')}}" method="post" class="contentForm" enctype="multipart/form-data">
      @csrf
    <div class="form-group">
        <label> اسم المستخدم : </label>
        <input type='text' name='name' class='form-control' value='{{old('name') }}' required>
    </div>
    <div class="form-group">
        <label> الايميل : </label>
        <input type='email' name='email' class='form-control' value='{{old('email') }}' required>
    </div>
    <div class="form-group">
        <label> كلمة االمرور : </label>
        <input type='password' name='password' class='form-control'  required>
    </div>
    <div class="form-group">
        <label> تاكيد كلمة المرور : </label>
        <input type='password' name='password_confirmation' class='form-control' required>
    </div>
    <div class="form-group">
        <label> الصلاحيات   : </label>
          <div class="row">
            <div class="col-md-12">
                @foreach($roles as $role)
                    <div class="btn-group" role="group">
                        <label class="btn btn-default ">
                          {{$role->name}}  <input  name='roles[]' value='{{$role->id}}' type="checkbox" >
                        </label>
                    </div>
                @endforeach
                </div>
          </div>
    </div>
    <div class="form-group">
        <label> المجموعة التابع لها    : </label>
        <div class="row">
          <div class="col-md-12">
              @foreach($groups as $group)
                  <div class="btn-group" role="group">
                      <label class="btn btn-default">
                        {{$group->name}}  <input  name='groups[]' value='{{$group->id}}' type="checkbox" >
                      </label>
                  </div>
              @endforeach
              </div>
        </div>
    </div>
      <button class="btn btn-block  btn-success">إضافة</button>
  </form>

@endcomponent
