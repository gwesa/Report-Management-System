@component('layouts.inc.basic_style')
  @section('title','التقارير  ')
  @slot('subject')
    التقارير
  @role(['Admin','Writer'])
    <a style="float: left;"class="btn btn-success btn-sm" href="{{route('report.create')}}"> إضافة</a>
  @endrole
  @endslot
  @include('layouts.inc.report.reportTable')
@endcomponent
