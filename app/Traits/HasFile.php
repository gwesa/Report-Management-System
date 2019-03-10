<?php
namespace App\Traits;

use App\Jobs\UploadFileJob;

trait HasFile {

  public function uploadFiles($request,$report)
  {
    return $request->hasfile('files') ? $this->upload(request('files'),$report)
                               : flash_success('تمت العملية بنجاح  ');
  }

  public function upload($files,$report)
  {
    UploadFileJob::dispatch($files,$report);
    return flash_success('تمت العملية سيتم اشعاك عبر البرريد الالكتروني عند اكتمال رفع الملفات   ');
  }
}
