<?php

namespace App\Jobs;

use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Barryvdh\Debugbar\Twig\Extension\Debug;


class UpdateLastLogin implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

   
    public function handle(Login $event)
    {
        Log::debug($event->user);
        
        dd("login fired and handled by class with User instance and remember variable");
        var_dump ($event->user);

        $user = User::find($event->Id); // find the user associated with this event
        $user->last_login = Carbon::now();
        $user->save();
    }
}
