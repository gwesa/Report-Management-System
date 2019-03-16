<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UpdateUserProfile as UpdateUserRequest ;

class ProfileController extends Controller
{

    public function index()
    {
      return view('profile.index');
    }

    public function update(UpdateUserRequest $request, User $user)
    {
      flash_if_success_or_fail($user->updateEmailPass());
      return back();
    }

}
