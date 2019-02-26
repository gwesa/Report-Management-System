
@component('layouts.inc.basic_style')
  @section('title','عنوان الصفحة ')
  @slot('subject')
    اسم التقرير
  @endslot
<div class="text-right">
  <fieldset class="border" >
    <legend class ='text-right font-weight-bold'> الوصف </legend>
    <p id="innerPara">الوصف</p>
  </fieldset>
  <fieldset class="border" >
    <legend class ='text-right font-weight-bold'> المرفقات </legend>
      <div class="table-responsive ">
        <table class="table table-hover popup" >
          <thead>
            <tr align='center'>
             <td> اسم الملف</td>
              <td>نوع الملف</td>
              <td >تنزيل </td>
              <td >عرض / تشغيل </td>
            </tr>
          </thead>
          <tbody>
            <tr align='center'>
              <td>الاسم</td>
              <td>mp3</td>
              </td>
              <td><a href="img.jpg" download><i class="fas fa-download"></i>  </a></td>
              <td>
                <audio id="Audio">
                 <source src="http://ice.somafm.com/groovesalad" type="audio/ogg">
                     Your browser does not support the audio element.
                </audio>
                <button class="btn btn-link "  id="playAudio" type="button"><i class="fas fa-play"></i>  </button>
                <button class="btn btn-link "  id="pauseAudio" type="button"><i class="fas fa-pause-circle"></i> </button>
            </td>
           </tr>
           <tr align='center'>
            <td>لاسم</td>
            <td>jpg</td>
            <td><a href="img.jpg" download><i class="fas fa-download"></i> </a></td>
            <td>
             <button class="btn btn-link img"
                    value="http://images5.fanpop.com/image/photos/30900000/beautiful-pic-different-beautiful-pictures-30958249-1600-1200.jpg"
                    type="button">
                    <i class="fas fa-eye"></i>
             </button>
            </td>
           </tr>
         </tbody>
        </table>
    </div>
  </fieldset>
  <fieldset class="border report-detail" >
    <legend class ='text-right font-weight-bold'> تفاصيل اخرى </legend>
    <div class="row">
      <div class="col-lg-4">
        <label class="font-weight-bold">التقرير تابع للمجموعة : </label>
         ksa
      </div>
      <div class="col-lg-4">
        <label class="font-weight-bold">الكاتب: </label>
         محمد عبداالعزيز
       </div>
       <div class="col-lg-4">
         <label class="font-weight-bold">التصنيف: </label>
         <span>رياضة</span><span>رياضة</span>
      </div>
    </div>
  </fieldset>
</div>

<form method="post" action="" style="margin-top:3%">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger btn-block"
  onclick="return confirm('هل انت متاكد من حذف المستخدم ?');">
    حذف التقرير</button>
</form>

<div class="show">
 <div class="overlay"></div>
 <div class="img-show">
    <span>X</span>
     <img src="">
 </div>
</div>

@endcomponent
