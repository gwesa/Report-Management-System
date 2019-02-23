<?php
namespace App\Traits;

use App\Group;

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


}
