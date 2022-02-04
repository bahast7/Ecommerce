<?php

namespace App\Providers;

use App\Listeners\AssignRoleForRegisteredUser;
use App\Models\Discount;
use App\Models\OrderItem;
use App\Models\Product;
use App\Observers\DiscountObserver;
use App\Observers\OrderItemObserver;
use App\Observers\ProductObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

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
            AssignRoleForRegisteredUser::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot()
    {
        OrderItem::observe(OrderItemObserver::class);
        Product::observe(ProductObserver::class);
        Discount::observe(DiscountObserver::class);
    }
}
