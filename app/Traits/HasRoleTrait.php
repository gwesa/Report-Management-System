<?php
namespace App\Traits;

use App\Role;

trait HasRoleTrait {

  public function roles()
  {
     return $this->belongsToMany(Role::class,'role_user');
  }

  public function assignRoles($roles)
  {
    $this->roles()->attach($roles);
  }

  public function hasRole($roles)
  {
     foreach($roles as $role) {
        if ($this->roles->contains('name', $role))
           return true ;
     }
      return false;
  }
  public function syncRoles($roles)
  {
    $this->roles()->sync($roles);
  }

}
