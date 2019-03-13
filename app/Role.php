<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Role extends Model
{
  use Cachable;

  protected $fillable = ['name','active'];

  public function users()
  {
     return $this->belongsToMany(User::class,'role_user');
  }
}
