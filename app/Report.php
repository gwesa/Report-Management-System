<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Cviebrock\EloquentTaggable\Taggable;

class Report extends Model
{
   use Cachable,Taggable;

   protected $fillable = ['name','description','user_id','group_id'];

   public function files()
   {
      return $this->hasMany(File::class);
   }

   public function user()
   {
      return $this->belongsTo(User::class);
   }

   public function group()
   {
      return $this->belongsTo(Group::class);
   }

}
