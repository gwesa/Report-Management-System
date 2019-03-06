<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;


class FilesUploadedEvent
{
    use Dispatchable, SerializesModels;


    public $report;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($report)
    {
        $this->report = $report;
    }

}
