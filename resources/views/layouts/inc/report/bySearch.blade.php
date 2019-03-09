<div class="row reports hide" id='search' >
    <form action="{{route('search')}}" method="get" style="width: 100%;">
    <label class="font-weight-bold" id=search-label>أختر طريقة البحث : </label>
    <input type="radio" value='name'    name='search' checked required > بإإسم التقرير
    <input type="radio" value='group'   name='search' required > بإسم المجموعة
    <input type="radio" value='writer'  name='search'required >بإسم الكاتب
    <input type="radio" value='content' name='search'required > باالمحتوى
    <input type="radio" value='tag'     name='search'required > بالتصنيف
  <div class="input-group mb-3 input-search">
    <input type="text" class="form-control" name='value' aria-describedby="basic-addon1">
    <div class="input-group-prepend">
      <button class="btn btn-outline-secondary" type="submit">بحث</button>
    </div>
  </div>
</form>
</div>
