<?php

namespace App\Providers;

use App\Events\SeriesCreated;
use App\Events\SeriesDeleted;
use App\Listeners\DeleteSeriesCover;
use App\Listeners\EmailUsersAboutSeriesCreated;
use App\Listeners\LogSeriesCreated;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SeriesCreated::class => [
            EmailUsersAboutSeriesCreated::class,
            LogSeriesCreated::class,
        ],
        SeriesDeleted::class => [
            DeleteSeriesCover::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
