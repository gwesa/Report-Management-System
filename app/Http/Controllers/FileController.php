<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;


class FileController extends Controller
{
  public function destroy(File $file)
  {
    $file->delete();
    return back();
  }
}
