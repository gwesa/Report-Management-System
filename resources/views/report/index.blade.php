
@component('layouts.inc.basic_style')
  @section('title', __('report.title') )
  @slot('subject')
    {{ __('report.title') }}
     @role(['Admin','Writer'])
      <a href="{{route('report.create')}}"
         class="btn btn-success btn-sm float-left">{{ __('main.add') }}
      </a>
    @endrole
  @endslot
    <div class="row header_report" >
      <div class="col-lg-3 active">
        <a href="#by_group"> {{ __('report.by_group') }} </a>
      </div>
      <div class="col-lg-3">
        <a href="#by_tag"> {{ __('report.by_tag') }} </a>
     </div>
      <div class="col-lg-3">
        <a href="#by_last"> {{ __('report.by_last') }}</a>
      </div>
      <div class="col-lg-3">
        <a href="#search"> {{ __('report.search') }} </a>
      </div>
    </div>
    <div>
      @include('layouts.inc.report.byGroup')
      @include('layouts.inc.report.byTag')
      @include('layouts.inc.report.byLast')
      @include('layouts.inc.report.bySearch')
   </div>
@endcomponent
