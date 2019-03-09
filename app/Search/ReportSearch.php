<?php

namespace App\Search;

use App\Report;
use Illuminate\Http\Request;

class ReportSearch
{

    public static function apply()
    {

      $query = (new Report)->newQuery();

      if (request('search') == 'name') {
            $query->where('name','LIKE','%'.request('value').'%');
      }

      if (request('search') == 'content') {
           $query->where('description','LIKE','%'.request('value').'%');
      }

      if (request('search') == 'tag'){
           $query->whereHas('tags',function($q){
                            $q->where('name','Like','%'.request('value').'%');
                         });
      }


      if (request('search') == 'group') {
          $query->whereHas('group',function($q){
                            $q->where('name','Like','%'.request('value').'%');
                         });
      }

      if (request('search') == 'writer') {
        $query->whereHas('user',function($q){
                            $q->where('name','Like','%'.request('value').'%');
                         });
      }

     return  $query->with('tags','group')
                  ->filterReports()
                  ->orderBy('created_at', 'ASC')
                  ->paginate(15);
    }
}
