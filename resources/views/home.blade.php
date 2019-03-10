@component('layouts.inc.basic_style')
  @section('title','نظام إدارة التقارير ')

  @slot('subject')
    اهلاً بعودتك
  @endslot

  <fieldset class="border" >
    <legend class ='text-right font-weight-bold'> بياناتي  </legend>
    <div class="row pb-3" >
       <div class="col-lg-6">
         <p>
           <b>الاسم: </b> &nbsp  {{auth()->user()->name}}
         </p>
       </div>
       <div class="col-lg-6">
         <p>
           <b>الايميل: </b> &nbsp {{auth()->user()->email}}
         </p>
       </div>
     </div>
  </fieldset>
  <fieldset class="border" >
    <legend class ='text-right font-weight-bold'> صلاحياتي  </legend>
      <div class="pb-4">
        @foreach(auth()->user()->roles as $role)
         {{ $loop->first ? '' : ', ' }}
         {{ $role->name}}
        @endforeach
      </div>
  </fieldset>

  <fieldset class="border" >
    <legend class ='text-right font-weight-bold'> مجموعاتي </legend>
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
