<?php

namespace App\Observers;

use App\Models\OrderItem;
use App\Models\User;
use App\Notifications\DataChangeEmailNotification;
use Notification;

class OrderItemObserver
{
    public function created(OrderItem $orderItem): void
    {
        $payload = [
            'action' => 'created',
            'model'  => sprintf('%s#%s', get_class($orderItem), $orderItem->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }

    public function updated(OrderItem $orderItem): void
    {
        $payload = [
            'action' => 'updated',
            'model'  => sprintf('%s#%s', get_class($orderItem), $orderItem->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }

    public function deleted(OrderItem $orderItem): void
    {
        $payload = [
            'action' => 'deleted',
            'model'  => sprintf('%s#%s', get_class($orderItem), $orderItem->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }
}
