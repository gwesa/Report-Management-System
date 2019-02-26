<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Report extends Model
{
   use Cachable ;

   protected $fillable = ['name','description','user_id','group_id'];

   public function files(){
      return $this->hasMany(File::class);
  }
}
