<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Report ;
use Cviebrock\EloquentTaggable\Models\Tag;
use App\Http\Requests\SearchRequest;
use App\Search\ReportSearch;

class SearchController extends Controller
{
      public function search(SearchRequest $request)
     {
        $reports = ReportSearch::apply();
        return view('report.ListOfReports',compact('reports'));
    }
}
