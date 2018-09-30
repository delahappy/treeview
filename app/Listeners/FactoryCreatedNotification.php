<?php

namespace App\Listeners;

use App\Events\CreateFactory;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class FactoryCreatedNotification
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
     * @param  CreateFactory  $event
     * @return void
     */
    public function handle(CreateFactory $event)
    {
        //
    }
}
