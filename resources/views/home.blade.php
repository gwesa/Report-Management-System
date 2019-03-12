@component('layouts.inc.basic_style')
  @section('title', __('main.app_name'))
  @slot('subject')
    {{ __('main.welcome') }}
  @endslot
  <fieldset class="border " >
    <legend class ='font-weight-bold text-right'> {{ __('main.details') }}  </legend>
    <div class="row pb-3" >
       <div class="col-lg-6">
         <p>
           <b> {{ __('main.name') }} </b> &nbsp  {{auth()->user()->name}}
         </p>
       </div>
       <div class="col-lg-6">
         <p>
           <b>{{ __('main.email') }}  </b> &nbsp {{auth()->user()->email}}
         </p>
       </div>
     </div>
  </fieldset>
  <fieldset class="border" >
    <legend class ='font-weight-bold text-right'> {{ __('main.roles') }}   </legend>
      <div class="pb-4">
        @foreach(auth()->user()->roles as $role)
         {{ $loop->first ? '' : ', ' }}
         {{ $role->name}}
        @endforeach
      </div>
  </fieldset>

  <fieldset class="border" >
    <legend class ='font-weight-bold text-right'> {{ __('main.groups') }}  </legend>
      <div class="pb-4">
        @if (!auth()->user()->isAdmin())
           @foreach(auth()->user()->groups as $group)
             {{ $loop->first ? '' : ', ' }}
             {{ $group->name}}
          @endforeach
        @else
         All
         @endif
       </div>
  </fieldset>

@endcomponent
