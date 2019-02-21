@component('layouts.inc.basic_style')
  @section('title','المجموعات  ')

  @slot('subject')
    المجموعات
    <a style="float: left;"class="btn btn-success btn-sm" href="{{route('group.create')}}"> إضافة</a>
  @endslot

  <table class="table table-bordered">
        <thead>
          <tr >
            <th >الإسم</th>
            <th  colspan="2">الإجراء</th>
            </tr>
        </thead>
        <tbody>
          @foreach($groups as $group)
            <tr>
                <td>{{$group->name}}</td>
                <td>
                  <a class="btn btn-info btn-sm" href="{{route('group.edit',$group->id)}}"> تعديل</a>
                </td>
                <td>
                  <form method="post" action="{{ route('group.destroy', [ $group->id]) }}">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-danger btn-sm"
                    onclick="return confirm('هل انت متاكد من حذف المجموعة?');">
                      حذف</button>
                  </form>
                </td>
            </tr>
          @endforeach
       </tbody>
 </table>
 <div class="d-flex justify-content-center">
    {{ $groups->links() }}
 </div>

@endcomponent
