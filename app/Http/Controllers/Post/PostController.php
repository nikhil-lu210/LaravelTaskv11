<?php

namespace App\Http\Controllers\Post;

use App\Models\Post\Post;
use Illuminate\Http\Request;
use App\Models\Website\Website;
use App\Mail\NewPostNotification;
use App\Http\Controllers\Controller;
use App\Jobs\SendPostEmailSubscriberJob;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'website_id'    => 'required | integer | exists:websites,id',
            'title'    => 'required | string | max:50',
            'description'     => 'required',
        ]);

        // Store Data
        $post = Post::create($request->all());

        // Fetch subscribers of the website
        $website = Website::select(['id'])->with([
            'subscribers' => function($query) {
                $query->select(['website_id', 'name', 'email']);
            }
        ])->findOrFail($post->website_id);
        $subscribers = $website->subscribers;

        // Send email to each subscriber
        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->queue(new NewPostNotification($post));
        }
        // $subscribers->chunk(10, function ($subscribers) use ($post) {
        //     foreach ($subscribers as $subscriber) {
        //         dispatch(new SendPostEmailSubscriberJob($subscriber, $post));
        //     }
        // });

        // Return a JSON response
        return response()->json([
            'message' => 'Data saved successfully',
            'post' => $post
        ], 201);
    }
}
