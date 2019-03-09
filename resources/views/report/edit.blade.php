@component('layouts.inc.basic_style')
  @section('title',$report->name)
  @slot('subject')
     تعديل التقرير : {{$report->name}}
  @endslot
  <form action="{{route('report.update',[$report->id])}}" method="post" class="contentForm" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <input name='id' type="hidden" value="{{$report->id}}">
    <div class="text-right">
      <fieldset class="p-3" >
        <div class="form-group">
           <legend class ='text-right font-weight-bold'> اسم التقرير :  </legend>
           <input type='text' name='name' class='form-control' value='{{$report->name}} ' required>
        </div>
        <div class="form-group">
           <legend class ='text-right font-weight-bold'> الوصف :   </legend>
           <textarea type='text' name='description' class='form-control' value='{{old('description') }}' required>
              {{$report->description}}
           </textarea>
        </div>
        <div class="form-group">
            <legend class ='text-right font-weight-bold'> تحميل ملف   : </legend>
            <div class="custom-file">
             <input type="file" name='files[]'  accept="audio/* , image/* "
                    class="custom-file-input" id="inputGroupFile01" multiple>
             <label class="custom-file-label" for="inputGroupFile01"></label>
            </div>
        </div>
      </fieldset>
      <fieldset class="border report-detail" >
        <legend class ='text-right font-weight-bold'> تفاصيل اخرى </legend>
        <div class="row text-right">
           <div class="col-lg-12">
             <label class="font-weight-bold">التصنيف: </label>
             <input type='text' name='tags' class='form-control ' value=' @foreach($report->tags as $tag ) {{$tag->name}}, @endforeach'  required>
          </div>
          <div class="col-lg-12">
            <label class="font-weight-bold mt-4 ">التقرير تابع للمجموعة : </label>
             @foreach($groups as $group)
                 <div class="btn-group" role="group">
                     <label class="btn btn-default btn-checkbox">
                       {{$group->name}}  <input  name='group_id'{{$report->group->id == $group->id ? 'checked' : '' }}  value='{{$group->id}}' type="radio" >
                     </label>
                 </div>
             @endforeach
          </div>
          <div class="col-lg-12">
           <label class="font-weight-bold view_files mt-3"> رؤية المرفقات
             <i class="fas fa-sort"></i>
           </label>
         </div>
        </div>
      </fieldset>
    </div>
    <br/>
    <button type="submit" class="btn btn-info btn-block" >تعديل التقرير</button>
  </form>
  <br/>

 <div id='files' style="display:none;">
  <fieldset class="">
    @if($report->files->count() > 0)
      <div class="table-responsive ">
        <table class="table table-hover table-bordered popup" >
          <thead>
            <tr align='center'>
             <td> اسم الملف</td>
              <td>نوع الملف</td>
              <td >تنزيل </td>
              <td >عرض / تشغيل </td>
              <td></td>
            </tr>
          </thead>
          <tbody>
            @foreach($report->files as $file)
             <tr align='center'>
              <td>{{$file->name}}</td>
              <td>{{$file->type}}</td>
               <td>
                 <a href="{{$s3Url}}/{{$file->path}}" download>
                   <i class="fas fa-download"></i>
                 </a>
               </td>
              @if($file->type == 'audio')
                <td>
                  <audio id="Audio">
                   <source src="{{$s3Url}}/{{$file->path}}" type="audio/ogg">
                         Your browser does not support the audio element.
                  </audio>
                  <button class="btn btn-link "  id="playAudio" type="button">
                    <i class="fas fa-play"></i>
                  </button>
                  <button class="btn btn-link "  id="pauseAudio" type="button">
                    <i class="fas fa-pause-circle"></i>
                  </button>
                </td>
              @else
              <td>
               <button class="btn btn-link img" value="{{$s3Url}}/{{$file->path}}" type="button">
                 <i class="fas fa-eye"></i>
               </button>
              </td>
              @endif
              <td>
                @role(['Delete','Admin'])
                  <form method="post" action="{{route('file.destroy', [$file->id])}}" >
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-danger btn-block"
                               onclick="return confirm('هل انت متاكد من حذف الملف?');">
                                حذف
                    </button>
                  </form>
                @endrole
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
    </div>
  </fieldset>
</div>
  <div class="show">
   <div class="overlay"></div>
   <div class="img-show">
    <span>X</span>
     <img src="">
   </div>
  </div>

@endcomponent
