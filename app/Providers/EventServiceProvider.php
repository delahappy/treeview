<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\CreateTree' => [
            'App\Listeners\TreeCreatedNotification',
        ],
        'App\Events\CreateFactory' => [
            'App\Listeners\FactoryCreatedNotification',
        ],
        'App\Events\DeleteFactory' => [
            'App\Listeners\FactoryDeletedNotification',
        ],
        'App\Events\UpdateFactory' => [
            'App\Listeners\FactoryUpdatedNotification',
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
