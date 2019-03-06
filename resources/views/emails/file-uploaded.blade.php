@component('mail::message')
# تم تحميل الملفات بنجاح

تم تحميل الملفات التابعه لتقرير  : {{$report->name }}
@component('mail::button', ['url' => '/report/' . $report->id])
الذهاب لتقرير
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
