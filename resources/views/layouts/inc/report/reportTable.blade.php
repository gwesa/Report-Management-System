<div class="table-responsive">
 <table class="table table-bordered">
   <thead>
     <tr>
       <th >اسم التقرير</th>
       <th >المجموعة</th>
       <th >التصنيف  </th>
       <th >التاريخ   </th>
       <th colspan="3"> الإجراء </th>
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
        <td><a class="btn btn-success btn-sm" href="{{route('report.show',[$report->id])}}"> عرض</a></td>
        @role(['Editor','Admin'])
         <td><a class="btn btn-info btnc-sm" href="{{route('report.edit',[$report->id])}}">تعديل </a></td>
        @endrole
        @role(['Delete','Admin'])
          <td>
            <form method="post" action="{{route('report.destroy' ,[ $report->id ])}}">
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-danger btn-sm"
                 onclick="return confirm('هل انت متاكد من حذف التقرير ?');">
                 حذف
              </button>
          </td>
        @endrole
       </tr>
  @endforeach
  </tbody>
</table>
</div>
{{ $reports->links() }}
