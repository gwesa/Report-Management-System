@component('layouts.inc.basic_style')
  @section('title',__('report.title') )
  @slot('subject')
    {{ __('report.title')}}
  @role(['Admin','Writer'])
    <a style="float: left;"class="btn btn-success btn-sm" href="{{route('report.create')}}"> {{ __('main.add')}}</a>
  @endrole
  @endslot
  @include('layouts.inc.report.reportTable')
@endcomponent
