@component('layouts.inc.basic_style')
  @section('title','التقارير  ')

  @slot('subject')
    التقارير
    <a style="float: left;"class="btn btn-success btn-sm" href="{{route('report.create')}}"> إضافة</a>
  @endslot

  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>اسم التقرير</th>
          <th>المجموعة</th>
          <th>التصنيف  </th>
          <th>تاريخ الإنشاء </th>
          <th colspan="3"> الإجراء </th>
        </tr>
     </thead>
     <tbody>
      <tr>
        <td>اعمال </td>
        <td>ksa</td>
        <td>الاعمال ،التجارة </td>
        <td>26-2-2019</td>
        <td><a class="btn btn-success btn-sm" href=""> عرض</a></td>
        <td><a class="btn btn-info btn-sm"href="">تعديل </a></td>
        <td>
          <form method="post" action="{{route('report.destroy' , [1] )}}">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger btn-sm"
               onclick="return confirm('هل انت متاكد من حذف التقرير ?');">
               حذف
            </button>
        </td>
       </tr>
     </tbody>
    </table>
  </div>
@endcomponent
