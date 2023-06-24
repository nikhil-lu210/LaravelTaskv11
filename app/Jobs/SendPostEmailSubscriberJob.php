<?php

namespace App\Jobs;

use App\Mail\SendPostEmailSubscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendPostEmailSubscriberJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $subscriber;
    protected $data;
    /**
     * Create a new job instance.
     */
    public function __construct($subscriber, $data)
    {
        dd([$this->subscriber, $this->data]);
        $this->subscriber = $subscriber;
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->subscriber['email'])->queue(new SendPostEmailSubscriber($this->data));
    }
}
