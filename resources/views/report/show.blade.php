
@component('layouts.inc.basic_style')
  @section('title',$report->name)
  @slot('subject')
  {{ __('report.report') }}  {{$report->name}}
  @endslot
  <div class="text-right">
    <fieldset class="border" >
      <legend class ='text-right font-weight-bold'> {{$report->name}} </legend>
      <p id="innerPara">{{$report->description}}  </p>
    </fieldset>
    <fieldset class="border" >
      <legend class ='text-right font-weight-bold'>  {{ __('report.attachments') }} </legend>
      @if($report->files->count() > 0)
        <div class="table-responsive ">
          <table class="table table-hover popup" >
            <thead>
              <tr align='center'>
                <td> {{ __('report.file name') }}</td>
                <td> {{ __('report.file type') }}</td>
                <td> {{ __('report.download') }} </td>
                <td> {{ __('report.view or play ') }}</td>
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
      <legend class ='text-right font-weight-bold'> {{ __('report.other details') }} </legend>
      <div class="row">
        <div class="col-lg-4">
          <label class="font-weight-bold"> {{ __('report.groups') }} </label>
           {{$report->group->name}}
        </div>
        <div class="col-lg-4">
          <label class="font-weight-bold "> {{ __('report.writer') }} </label>
           {{$report->user->name ?? 'deleted'}}
         </div>
         <div class="col-lg-4">
           <label class="font-weight-bold"> {{ __('report.tags') }} </label>
           @foreach($report->tags as $tag )
           <span>{{$tag->name}}</span>
           @endforeach
        </div>
      </div>
    </fieldset>
  </div>
    @role(['Delete','Admin'])
      <form method="post" action="{{route('report.destroy', [$report->id])}}" style="margin-top:3%">
          @method('DELETE')
          @csrf
          <button type="submit" class="btn btn-danger btn-block"
        onclick="return confirm({{__('message.delete report')}});">
          {{ __('main.delete') }} </button>
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
