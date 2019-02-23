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
      DB::beginTransaction();
      try
         {
            $user = User::create(request(['name','email','password']));
            $user->assignRoles(request('roles'));
            $user->assignGroups(request('groups'));
            DB::commit();

         } catch (\Exception $e) {
            DB::rollback();
            flash_fail('هناك خطاء يرجى المحاولة في وقت اخر');
            return back();

         }
         flash_success('تمت  اضافة العميل بنجاح ');
         return back();
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }
}
