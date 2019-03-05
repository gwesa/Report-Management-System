@component('layouts.inc.basic_style')
  @section('title','تقرير جديد  ')

  @slot('subject')
    إضافة تقرير جديد
  @endslot
  @if($groups->count() > 0 )
    <form action="{{route('report.store')}}" method="post" class="contentForm" enctype="multipart/form-data">
        @csrf
      <div class="form-group">
          <label>  اسم التقرير : </label>
          <input type='text' name='name' class='form-control' value='{{old('name') }}' required>
      </div>
      <div class="form-group">
          <label> الوصف : </label>
          <textarea type='text' name='description' class='form-control' value='{{old('description') }}' required>
          </textarea>
      </div>
      <div class="form-group">
          <label> تحميل ملف   : </label>
          <div class="custom-file">
           <input type="file" name='files[]'  multiple  class="custom-file-input" id="inputGroupFile01">
           <label class="custom-file-label" for="inputGroupFile01"></label>
         </div>
      </div>
      <div class="form-group">
          <label> االتصنيف   : </label>
            <input type='text' name='tags' class='form-control' value='{{old('name') }}'  placeholder=" Technology , Sports , Medical .. etc" required>
      </div>
      <div class="form-group">
          <label> المجموعة التابع لها    : </label>
          <div class="row">
            <div class="col-md-12">
                @foreach($groups as $group)
                    <div class="btn-group" role="group">
                        <label class="btn btn-default btn-checkbox">
                          {{$group->name}}  <input  name='group_id' value='{{$group->id}}' type="checkbox" >
                        </label>
                    </div>
                @endforeach
                </div>
          </div>
      </div>
        <button class="btn btn-block  btn-success">إضافة</button>
    </form>
    @else
        <h3>يجب إضافة مجموعة واحده على الاقل لإضافة تقرير   </h3>
    @endif
  @endcomponent
