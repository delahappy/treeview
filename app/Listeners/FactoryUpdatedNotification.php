<?php

namespace App\Listeners;

use App\Events\UpdateFactory;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class FactoryUpdatedNotification
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
     * @param  UpdateFactory  $event
     * @return void
     */
    public function handle(UpdateFactory $event)
    {
        //
    }
}
