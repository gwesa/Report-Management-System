<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use App\Jobs\DeleteFileJob;

class FileController extends Controller
{

  public function __construct()
   {
      $this->middleware('role:Delete');
   }

  public function destroy(File $file)
  {
    $file->delete();
    DeleteFileJob::dispatch($file->path);
    return back();
  }
}
