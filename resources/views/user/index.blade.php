@component('layouts.inc.basic_style')
  @section('title','المستخدمين  ')

  @slot('subject')
    مستخدمين النظام
    <a style="float: left;"class="btn btn-success btn-sm" href="{{route('user.create')}}"> إضافة</a>
  @endslot
   <div class="table-responsive">
    <table class="table table-bordered">
          <thead>
            <tr >
              <th >الإسم</th>
              <th >الإيميل</th>
              <th >الصلاحيات </th>
              <th >المجموعات </th>
              <th  colspan="2">الإجراء</th>
              </tr>
          </thead>
          <tbody>
            @forelse($users as $user)
              <tr>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>
                    @forelse($user->roles as $role)
                     {{ $loop->first ? '' : ', ' }}
                      {{$role->name}}
                    @empty
                      لا يوجد
                    @endforelse
                  </td>
                  <td >
                    @forelse($user->groups as $group)
                      {{ $loop->first ? '' : ', ' }}
                      {{$group->name }}
                    @empty
                    لا يوجد
                    @endforelse
                  </td>
                  <td>
                    <form method="post" action="{{ route('user.destroy', [ $user->id]) }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm"
                      onclick="return confirm('هل انت متاكد من حذف المستخدم ?');">
                        حذف</button>
                    </form>
                  </td>
                  <td>
                    <a class="btn btn-info btn-sm" href="{{route('user.edit',$user->id)}}"> تعديل</a>
                  </td>
              </tr>
            @endforeach
         </tbody>
       </div>
   </table>
@endcomponent
