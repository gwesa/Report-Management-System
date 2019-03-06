<?php

namespace App\Listeners;

use App\Events\FilesUploadedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\FilesUploaded;

class SendFilesUploadedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  FilesUploadedEvent  $event
     * @return void
     */
    public function handle(FilesUploadedEvent $event)
    {
      Mail::to($event->report->user->email)->send(
        new FilesUploaded($event->report)
      );
    }
}
