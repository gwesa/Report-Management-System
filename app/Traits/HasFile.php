<?php
namespace App\Traits;

use App\Jobs\UploadFileJob;
use Lang;

trait HasFile {

  public function uploadFiles($request,$report)
  {
    return $request->hasfile('files') ? $this->upload(request('files'),$report)
                               : flash_success(\Lang::get('message.success'));
  }

  public function upload($files,$report)
  {
    UploadFileJob::dispatch($files,$report);
    return flash_success(\Lang::get('message.success'));
  }
}
