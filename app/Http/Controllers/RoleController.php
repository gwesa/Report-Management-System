<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;

use App\Role;

class RoleController extends Controller
{
  public function index()
  {
    $roles = Role::where('name','!=','Admin')->get();
    return view('role.index',compact('roles'));
  }

  public function update(Request $request, Role $role)
  {
    $method = request()->has('active') ? 'active' : 'inactive';
    $role->$method();
    return back();
  }

}
