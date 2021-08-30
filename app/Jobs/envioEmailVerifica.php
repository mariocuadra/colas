<?php

namespace App\Jobs;

use App\Mail\mailBienvenida;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class envioEmailVerifica implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    private string $userEmail;
    /**
     * Create a new job instance.
     *
     * @return void
     */

   

    public function __construct(string $userEmail)
    {
    
        $this->userEmail =$userEmail;
        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $mail = new mailBienvenida();

        Mail::to($this->userEmail)->queue($mail);
        
    }
}
