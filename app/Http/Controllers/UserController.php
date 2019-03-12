<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use App\Group;
use Auth;
use DB;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
      $users = User::where('id','!=',Auth::id())->with(['groups','roles'])->get();
      return view('user.index',compact('users'));
    }

    public function create()
    {
      $roles  = Role::get();
      $groups = Group::get();
      return view('user.create',compact('roles','groups'));
    }

    public function store(CreateUserRequest $request)
    {
      $user = User::create(request(['name','email','password']));
      $user->assignRoles(request('roles'));
      $user->assignGroups(request('groups'));
      flash_success(\Lang::get('message.success'));
      return back();
    }
    
    public function edit(User $user)
    {
      $roles  = Role::get();
      $groups = Group::get();
      return view('user.edit',compact('user','roles','groups'));
    }

    public function update(Request $request, User $user)
    {
      $user->update(request(['name','email']));
      $user->syncRoles(request('roles'));
      flash_success(\Lang::get('message.success'));
      return back();
    }

    public function destroy(User $user)
    {
      flash_if_success_or_fail($user->delete());
      return back();
    }
}
