<?php

namespace App\Http\Controllers\Subscriber;

use App\Http\Controllers\Controller;
use App\Models\Subscriber\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'website_id'    => 'required | integer | exists:websites,id',
            'name'    => 'required | string | max:50',
            'email'     => 'required',
        ]);

        // Store Data
        $subscriber = Subscriber::create($request->all());

        // Return a JSON response
        return response()->json([
            'message' => 'Data saved successfully',
            'subscriber' => $subscriber
        ], 201);
    }
}
