<?php

namespace App\Listeners;

use App\Events\SeriesDeleted as EventsSeriesDeleted;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;

class DeleteSeriesCover implements ShouldQueue
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
     * @param  object  $event
     * @return void
     */
    public function handle(EventsSeriesDeleted $event)
    {
        Storage::disk('public')->delete($event->seriesCoverPath);
    }
}
