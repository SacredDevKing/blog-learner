<?php

namespace App\Jobs;

use App\Listeners\EmailListener;
use App\Mail\UpdateGrantNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class UpdatedGrantJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $emails;

    protected $nameGrant;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($emails, $nameGrant)
    {
        $this->emails = $emails;
        $this->nameGrant = $nameGrant;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->emails)->send(new UpdateGrantNotification($this->nameGrant));
    }
}
