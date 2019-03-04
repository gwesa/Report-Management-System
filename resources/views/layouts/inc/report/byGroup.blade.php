<div class="row reports active" id='by_group' >
  @foreach($groups as $group)
    <div class="col-lg-4">
      <div class="min-title">
         <a href=""> {{$group->name}} </a>
       </div>
      <div class="number-report">عدد التقارير {{$group->reports()->count()}}</div>
    </div>
  @endforeach
</div>
