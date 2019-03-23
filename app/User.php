<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\softDeletes;
use App\Traits\HasRoleTrait;
use App\Traits\HasGroupTrait;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable,softDeletes,HasRoleTrait,HasGroupTrait,Cachable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','lang'
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


      public function updateEmailPass()
      {
        $data = request('password') == null ? request(['email']) : request()->all();
        return $this->update($data);
      }

      public function reports()
     {
         return $this->hasMany(Report::class);
     }

     public function isAdmin()
    {
       return $this->hasRole(['Admin'])? true : false ;
    }

    public function cresteReport()
    {
      return $this->reports()
                  ->create(request(['name','description','group_id']))
                  ->tag(request('tags'));
    }

    public function setPasswordAttribute($pass){
      $this->attributes['password'] = Hash::needsRehash($pass) ? Hash::make($pass) : $pass;

    }
}
