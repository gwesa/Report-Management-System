<?php
namespace App\Traits;

use Image;

trait UploadFileTrait {


  protected $path ;
  protected $files ;
  protected $name ;
  protected $extension ;
  protected $type ;
  protected $storageName ;
  protected $report ;
  protected $imagExtensions = ['jpeg','png','jpg','gif','svg'];
  protected $audioExtensions= ['mpga','ogg','mp3'];

  protected function processFile($files)
  {
    foreach ($files as $file) {
      $this->extension = $this->getExtension($file);
      $this->type = $this->getFileType($this->extension);
      $this->name = $this->getName($file);
      $this->storageName = $this->getStorageName($this->report->id,$this->name);
      $this->path = $this->getPath($this->type,$this->storageName);
      $file = ($this->type  == 'image' ? $this->resizeImage($file) : file_get_contents($file));
      $filesProcessed[] = $this->putFileInfoInArray($file);
    }
    return $filesProcessed ;
  }

  protected function getPath($type,$storageName)
  {
    return $type.'/'.$storageName ;
  }

  protected function getStorageName($reportId,$name)
  {
    return $reportId.'.'.time().'.'.$name;
  }

  protected function resizeImage($file)
  {
  return (Image::make($file)->resize(1000, null))->encode('jpg')->__toString();

  }
  protected function getExtension($file)
  {
    return $file->getClientOriginalExtension() ;
  }

  protected function getName($file)
  {
    return $file->getClientOriginalName();
  }

  protected function getFileType($extension)
  {
    if(in_array($extension , $this->imagExtensions))
      return 'image';
    if(in_array($extension , $this->audioExtensions))
      return 'audio';
  }

  protected function putFileInfoInArray($file)
  {
    return [ 'file' => base64_encode($file),
             'type' => $this->type,
             'name' => $this->name,
             'path' => $this->path
           ];
  }

}
