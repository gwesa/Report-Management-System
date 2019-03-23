<?php
namespace App\Traits;

use App\Jobs\UploadFileJob;
use Lang;

trait HasFile {

  public function uploadFiles($request,$report,$email)
  {
    return $request->hasfile('files') ? $this->upload(request('files'),$report,$email)
                               : flash_success(\Lang::get('message.success'));
  }

  public function upload($files,$report,$email)
  {
    UploadFileJob::dispatch($files,$report,$email);
    return flash_success(\Lang::get('message.upload success'));
  }
}
