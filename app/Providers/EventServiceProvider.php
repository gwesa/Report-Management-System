<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use App\Listeners\SendFilesUploadedNotification;
use App\Events\FilesUploadedEvent;
use App\Events\FilesUploadFailedEvent;
use App\Listeners\SendFilesUploadFailedNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        FilesUploadedEvent::class => [
          SendFilesUploadedNotification::class,
       ],

       FilesUploadFailedEvent::class => [
         SendFilesUploadFailedNotification::class,
      ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
