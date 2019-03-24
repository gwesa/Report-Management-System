<div class="row reports hide" id='search' >
    <form action="{{route('search')}}" method="get" style="width: 100%;">
    <label class="font-weight-bold" id=search-label>{{ __('report.searchـmethod')}} </label>
    <div>
      <input type="radio" value='name'    name='search' checked required > {{ __('report.search_name')}}
      <input type="radio" value='group'   name='search' required >{{ __('report.search_group')}}
      <input type="radio" value='writer'  name='search'required >{{ __('report.search_writer')}}
      <input type="radio" value='content' name='search'required > {{ __('report.search_content')}}
      <input type="radio" value='tag'     name='search'required > {{ __('report.search_tag')}}
    </div>
  <div class="input-group mb-3 input-search">
    <input type="text" class="form-control" name='value' aria-describedby="basic-addon1">
    <div class="input-group-prepend">
      <button class="btn btn-outline-secondary" type="submit">{{ __('report.search')}}</button>
    </div>
  </div>
</form>
</div>
