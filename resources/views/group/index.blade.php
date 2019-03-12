@component('layouts.inc.basic_style')
  @section('title', __('main.groups'))

  @slot('subject')
    {{ __('main.groups') }}
    <a style="float: left;"class="btn btn-success btn-sm" href="{{route('group.create')}}"> {{ __('main.add')}}</a>
  @endslot

  <table class="table table-bordered">
        <thead>
          <tr >
            <th >{{ __('group.name')}}</th>
            <th  colspan="2">{{ __('main.action') }}</th>
            </tr>
        </thead>
        <tbody>
          @foreach($groups as $group)
            <tr>
                <td>{{$group->name}}</td>
                <td>
                  <a class="btn btn-info btn-sm" href="{{route('group.edit',$group->id)}}"> {{ __('main.edit' )}}</a>
                </td>
                <td>
                  <form method="post" action="{{ route('group.destroy', [ $group->id]) }}">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-danger btn-sm"
                              onclick="return confirm({{ __('message.delete group') }});">
                            {{ __('main.delete') }}
                    </button>
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
