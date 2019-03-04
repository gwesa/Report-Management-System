<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Group extends Model
{

  use Cachable;
  protected $fillable = ['name'];

  public function users()
 {
   return $this->belongsToMany(User::class,'group_user');
 }

  public function reports()
 {
     return $this->hasMany(Report::class);
 }
}
