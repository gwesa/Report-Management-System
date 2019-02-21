<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{

    public function index()
    {
      $groups = Group::paginate(15);
      return view('group.index',compact('groups'));
    }



    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function edit(Group $group)
    {
        //
    }


    public function update(Request $request, Group $group)
    {
        //
    }


    public function destroy(Group $group)
    {
        //
    }
}
