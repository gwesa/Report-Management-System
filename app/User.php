<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable,softDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = ['deleted_at'];

    public function roles()
    {
       return $this->belongsToMany(Role::class,'role_user');
    }

    public function groups()
    {
       return $this->belongsToMany(Group::class,'group_user');
    }

      public function updateEmailPass()
    {
      $data = request('password') == null ? request(['email']) : request()->all();
      return $this->update($data);
    }

    public function assignRoles($roles)
    {
      $this->roles()->attach($roles);
    }

    public function assignGroups($groups)
    {
      $this->groups()->attach($groups);
    }

    public function syncGroups($groups)
    {
      $this->groups()->sync($groups);
    }
    public function syncRoles($roles)
    {
      $this->roles()->sync($roles);
    }


    public function setPasswordAttribute($pass){

      $this->attributes['password'] = Hash::make($pass);
    }
}
