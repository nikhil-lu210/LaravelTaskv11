<?php

namespace App\Http\Controllers\Post;

use App\Models\Post\Post;
use Illuminate\Http\Request;
use App\Models\Website\Website;
use App\Mail\NewPostNotification;
use App\Http\Controllers\Controller;
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
        $website = Website::findOrFail($post->website_id);
        $subscribers = $website->subscribers;

        // Send email to each subscriber
        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->queue(new NewPostNotification($post));
        }

        // Return a JSON response
        return response()->json([
            'message' => 'Data saved successfully',
            'post' => $post
        ], 201);
    }
}
