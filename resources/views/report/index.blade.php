
@component('layouts.inc.basic_style')
  @section('title','التقارير  ')
  @slot('subject')
    التقارير
     @role(['Admin','Writer'])
      <a href="{{route('report.create')}}"
         class="btn btn-success btn-sm float-left"> إضافة
      </a>
    @endrole
  @endslot
    <div class="row header_report" >
      <div class="col-lg-3 active">
        <a href="#by_group"> حسب المجموعة </a>
      </div>
      <div class="col-lg-3">
        <a href="#by_tag"> حسب التصنيف  </a>
     </div>
      <div class="col-lg-3">
        <a href="#by_last"> اخر التقارير</a>
      </div>
      <div class="col-lg-3">
        <a href="#search">مركز البحث </a>
      </div>
    </div>
    <div>
      @include('layouts.inc.report.byGroup')
      @include('layouts.inc.report.byTag')
      @include('layouts.inc.report.byLast')
      @include('layouts.inc.report.bySearch')
   </div>
@endcomponent
