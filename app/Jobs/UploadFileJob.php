<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Traits\UploadFileTrait;
use App\Report;
use Storage;

class UploadFileJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels ,UploadFileTrait;

    /**
     * Create a new job instance.
     *
     * @return void
     */


    public function __construct($file,Report $reportId)
    {
        $this->report = $reportId;
        $this->extension = $this->getExtension($file);
        $this->type = $this->getFileType($this->extension);
        $this->name = $this->getName($file);
        $this->storageName = $this->getStorageName($reportId->id,$this->name);
        $this->path = $this->getPath($this->type,$this->storageName);
        $this->file = base64_encode($this->processFile($this->type,$file));
    }

    /**
     * Execute the job.
     *
     * @return void
     */

    public function handle()
    {
      Storage::disk('s3')->put($this->path,base64_decode($this->file));
      $createFile = $this->report->createFile($this->name,$this->type,$this->path);
    }


}
