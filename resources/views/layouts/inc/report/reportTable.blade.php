<div class="table-responsive">
 <table class="table table-bordered">
   <thead>
     <tr>
       <th >{{ __('report.name')}}</th>
       <th >{{ __('main.groups')}}</th>
       <th >{{ __('report.tags')}} </th>
       <th >{{ __('report.date')}}   </th>
       <th colspan="3"> {{ __('main.action')}} </th>
     </tr>
   </thead>
 <tbody>
   @foreach($reports as $report)
      <tr>
        <td>{{$report->name}} </td>
        <td>{{$report->group->name}}</td>
        <td>
          @foreach($report->tags as $tag)
            {{ $loop->first ? '' : ', ' }}
            {{$tag}}
          @endforeach
        </td>
        <td>{{$report->created_at}}</td>
        <td><a class="btn btn-success btn-sm" href="{{route('report.show',[$report->id])}}">{{ __('main.view')}}</a></td>
        @role(['Editor','Admin'])
         <td><a class="btn btn-info btnc-sm" href="{{route('report.edit',[$report->id])}}">{{ __('main.edit')}} </a></td>
        @endrole
        @role(['Delete','Admin'])
          <td>
            <form method="post" action="{{route('report.destroy' ,[ $report->id ])}}">
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-danger btn-sm"
                 onclick="return confirm({{ __('message.delete report')}});">
                 {{ __('main.delete')}}
              </button>
            </form>
          </td>
        @endrole
       </tr>
  @endforeach
  </tbody>
</table>
</div>
{{ $reports->appends(['search' => request()->query('search')])->links() }}
