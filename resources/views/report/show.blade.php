
@component('layouts.inc.basic_style')
  @section('title',$report->name)
  @slot('subject')
  التقرير :  {{$report->name}}
  @endslot
  <div class="text-right">
    <fieldset class="border" >
      <legend class ='text-right font-weight-bold'> {{$report->name}} </legend>
      <p id="innerPara">{{$report->description}}  </p>
    </fieldset>
    <fieldset class="border" >
      <legend class ='text-right font-weight-bold'> المرفقات </legend>
      @if($report->files->count() > 0)
        <div class="table-responsive ">
          <table class="table table-hover popup" >
            <thead>
              <tr align='center'>
               <td> اسم الملف</td>
                <td>نوع الملف</td>
                <td >تنزيل </td>
                <td >عرض / تشغيل </td>
              </tr>
            </thead>
            <tbody>
              @foreach($report->files as $file)
               <tr align='center'>
                <td>{{$file->name}}</td>
                <td>{{$file->type}}</td>
                 </td>
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
                    <button class="btn btn-link "  id="playAudio" type="button"><i class="fas fa-play"></i>  </button>
                    <button class="btn btn-link "  id="pauseAudio" type="button"><i class="fas fa-pause-circle"></i> </button>
                  </td>
                @else
                <td>
                 <button class="btn btn-link img" value="{{$s3Url}}/{{$file->path}}" type="button"> <i class="fas fa-eye"></i></button>
                </td>
                @endif
              </tr>
            @endforeach
          </tbody>
        </table>
      @endif
      </div>
    </fieldset>
    <fieldset class="border report-detail" >
      <legend class ='text-right font-weight-bold'> تفاصيل اخرى </legend>
      <div class="row">
        <div class="col-lg-4">
          <label class="font-weight-bold">التقرير تابع للمجموعة : </label>
           {{$report->group->name}}
        </div>
        <div class="col-lg-4">
          <label class="font-weight-bold ">الكاتب: </label>
           {{$report->user->name ?? 'deleted'}}
         </div>
         <div class="col-lg-4">
           <label class="font-weight-bold">التصنيف: </label>
           @foreach($report->tags as $tag )
           <span>{{$tag->name}}</span>
           @endforeach
        </div>
      </div>
    </fieldset>
  </div>
    @role(['Delete','Admin'])
      <form method="post" action="{{url('report.delete', [$report->id])}}" style="margin-top:3%">
          @method('DELETE')
          @csrf
          <button type="submit" class="btn btn-danger btn-block"
        onclick="return confirm('هل انت متاكد من حذف التقرير?');">
          حذف التقرير</button>
      </form>
    @endrole

  </div>
  <div class="show">
     <div class="overlay"></div>
     <div class="img-show">
      <span>X</span>
       <img src="">
     </div>
  </div>

@endcomponent
