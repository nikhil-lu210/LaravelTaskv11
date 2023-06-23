<?php

namespace App\Mail;

use App\Models\Post\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewPostNotification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function build()
    {
        return $this->subject('New Post Notification')
                    ->view('emails.new_post_notification')
                    ->with([
                        'title' => $this->post->title,
                        'description' => $this->post->description,
                    ]);
    }
}
