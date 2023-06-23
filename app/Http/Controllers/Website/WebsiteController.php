<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Website\Website;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'    => 'required | string | max:100',
            'url'     => 'required',
        ]);

        // Store Data
        $website = Website::create($request->all());

        // Return a JSON response
        return response()->json([
            'message' => 'Data saved successfully',
            'website' => $website
        ], 201);
    }
}
