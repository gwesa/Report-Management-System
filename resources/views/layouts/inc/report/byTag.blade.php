<div class="row reports hide" id='by_tag' >
  @foreach($tags as $tag)
    <div class="col-lg-4">
      <div class="min-title">
        <a href=''>{{$tag->name}} </a>
      </div>
    </div>
  @endforeach
</div>
