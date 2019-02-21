<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use App\Http\Requests\GroupRequest ;

class GroupController extends Controller
{

    public function index()
    {
      $groups = Group::paginate(15);
      return view('group.index',compact('groups'));
    }



    public function create()
    {
       return view('group.create');
    }


    public function store(GroupRequest $request)
    {
       flash_if_success_or_fail(Group::create(request(['name'])));
       return back();
    }


    public function edit(Group $group)
    {
      return view('group.edit',compact('group'));
    }


    public function update(GroupRequest $request, Group $group)
    {
      flash_if_success_or_fail($group->update(request(['name'])));
      return back();
    }


    public function destroy(Group $group)
    {
      flash_if_success_or_fail($group->delete());
      return back();
    }
}
