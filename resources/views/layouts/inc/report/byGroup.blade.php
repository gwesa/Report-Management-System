<div class="row reports active" id='by_group' >
  @foreach($groups as $group)
    <div class="col-lg-4">
      <div class="min-title">
         <a href="{{route('reportByGroup',[$group->id])}}"> {{$group->name}} </a>
       </div>
      <div class="number-report">{{ __('report.report_number') }}  {{$group->reports()->count()}}</div>
    </div>
  @endforeach
</div>
