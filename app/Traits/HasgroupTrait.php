<?php
namespace App\Traits;

use App\Group;
use Auth;

trait HasGroupTrait {

  public function groups()
  {
     return $this->belongsToMany(Group::class,'group_user');
  }

  public function assignGroups($groups)
  {
    $this->groups()->attach($groups);
  }

  public function syncGroups($groups)
  {
    $this->groups()->sync($groups);
  }

  public function userGroups()
  {
    return $this->isAdmin() ? Group::get() : $this->groups ;
  }

  public function userGroupIds()
  {
     return $this->groups->pluck('id')->toArray() ;
  }

  public function hasGroup($groupId)
  {
    return $this->isAdmin() ? true : in_array($groupId,Auth::user()->userGroupIds());
  }


}
