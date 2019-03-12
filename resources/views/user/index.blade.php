@component('layouts.inc.basic_style')
  @section('title', __('user.title'))

  @slot('subject')
    {{ __('user.title')}}
    <a style="float: left;"class="btn btn-success btn-sm" href="{{route('user.create')}}"> {{ __('main.add')}}</a>
  @endslot
   <div class="table-responsive">
    <table class="table table-bordered">
          <thead>
            <tr >
              <th >{{ __('main.name')}}</th>
              <th >{{ __('main.email')}}</th>
              <th >{{ __('main.roles')}} </th>
              <th >{{ __('main.groups')}} </th>
              <th  colspan="2">{{ __('main.action')}} </th>
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
                     {{ __('message.nothing')}}
                    @endforelse
                  </td>
                  <td >
                    @forelse($user->groups as $group)
                      {{ $loop->first ? '' : ', ' }}
                      {{$group->name }}
                    @empty
                     {{ __('message.nothing')}}
                    @endforelse
                  </td>
                  <td>
                    <form method="post" action="{{ route('user.destroy', [ $user->id]) }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm({{ __('message.delete user')}});">
                                 {{ __('main.delete')}}
                      </button>
                    </form>
                  </td>
                  <td>
                    <a class="btn btn-info btn-sm" href="{{route('user.edit',$user->id)}}"> {{ __('main.edit')}}</a>
                  </td>
              </tr>
            @endforeach
         </tbody>
       </div>
   </table>
@endcomponent
