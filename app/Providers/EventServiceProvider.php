<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\LoginHistory;
use App\Listeners\StoreUserLoginHistory;

use App\Events\NewsCreatedHistory;
use App\Listeners\StoreNewsHistory;

use App\Events\NewsUpdatedHistory;
use App\Listeners\UpdateNewsHistory;

use App\Events\NewsDeleteHistory;
use App\Listeners\DeleteNewsHistory;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        LoginHistory::class => [
            StoreUserLoginHistory::class
        ],
        NewsCreatedHistory::class => [
            StoreNewsHistory::class
        ],
        NewsUpdatedHistory::class => [
            UpdateNewsHistory::class
        ],
        NewsDeleteHistory::class => [
            DeleteNewsHistory::class
        ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
