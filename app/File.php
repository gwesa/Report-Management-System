<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class File extends Model
{
    use Cachable ;

    protected $fillable = ['name','path','type','report_id'] ;

}
