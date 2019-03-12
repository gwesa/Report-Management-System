<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class langController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,$lang)
    {
      (in_array($lang ,['en','ar'])) ? $lang = $lang : $lang = 'en' ;
      session()->has('lang') ? session()->forget('lang'): '';
      auth()->user() ? auth()->user()->update(['lang' => $lang]) : session()->put('lang',$lang);
      return back();
    }
}
