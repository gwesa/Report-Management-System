@component('mail::message')
# {{ __('report.email file uploaded')}}

{{ __('report.email files belong')}} : {{$report->name }}
@component('mail::button', ['url' => '/report/' . $report->id])
{{ __('report.email go to Report')}}
@endcomponent

{{ config('app.name') }}
@endcomponent
