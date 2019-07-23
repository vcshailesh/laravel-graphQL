<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class UserListener
{

    public function onCreated($event)
    {
        Log::info($event->message);
    }

    public function subscribe($events){
        $events->listen(
            \App\Events\UserEvent::class,
            'App\Listeners\UserListener@onCreated'
        );
    }
}
