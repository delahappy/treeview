<?php

namespace App\Listeners;

use App\Events\DeleteFactory;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class FactoryDeletedNotification
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
     * @param  DeleteFactory  $event
     * @return void
     */
    public function handle(DeleteFactory $event)
    {
        //
    }
}
