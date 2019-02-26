<div class="row reports hide" id='by_last' >
  <div class="table-responsive">
   <table class="table table-bordered">
     <thead>
       <tr>
         <th >اسم التقرير</th>
         <th >المجموعة</th>
         <th >التصنيف  </th>

         <th colspan="3"> الإجراء </th>
       </tr>
     </thead>
   <tbody>
     <tr>
       <td>اعمال </td>
       <td>ksa, usaksa, usaksa, usaksa, usaksa,   </td>
       <td>>التجاره ، الاعمال>التجاره ، الاعمال>التجاره ، الاعمال</td>
       <td><a  class="btn btn-success btn-sm" href=""> عرض</a></td>
       <td><a  class="btn btn-info btn-sm"href="">تعديل </a></td>
       <td>
        <form method="post" action="">
          @method('DELETE')
          @csrf
          <button type="submit" class="btn btn-danger btn-sm"
             onclick="return confirm('هل انت متاكد من حذف المستخدم ?');">
             حذف
           </button>
       </td>
      </tr>
      <tr>
        <td>اعمال </td>
        <td>ksa, usaksa, usaksa, usaksa</td>
        <td>>التجاره ، الاعمال>التجاره ، الاعمال>التجاره ، الاعمال</td>
        <td><a  class="btn btn-success btn-sm" href=""> عرض</a></td>
        <td><a  class="btn btn-info btn-sm"href="">تعديل </a></td>
        <td>
         <form method="post" action="">
           @method('DELETE')
           @csrf
           <button type="submit" class="btn btn-danger btn-sm"
              onclick="return confirm('هل انت متاكد من حذف المستخدم ?');">
              حذف
            </button>
        </td>
       </tr>
    </tbody>
  </table>
  </div>
</div>
