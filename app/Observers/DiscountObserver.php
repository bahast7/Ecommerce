<?php

namespace App\Observers;

use App\Models\Discount;
use App\Models\User;
use App\Notifications\DataChangeEmailNotification;
use Notification;

class DiscountObserver
{
    public function created(Discount $discount): void
    {
        $payload = [
            'action' => 'created',
            'model'  => sprintf('%s#%s', get_class($discount), $discount->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }

    public function updated(Discount $discount): void
    {
        $payload = [
            'action' => 'updated',
            'model'  => sprintf('%s#%s', get_class($discount), $discount->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }

    public function deleted(Discount $discount): void
    {
        $payload = [
            'action' => 'deleted',
            'model'  => sprintf('%s#%s', get_class($discount), $discount->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }
}
