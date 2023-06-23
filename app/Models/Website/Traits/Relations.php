<?php

namespace App\Models\Website\Traits;

use App\Models\Post\Post;
use App\Models\Subscriber\Subscriber;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait Relations
{
    public function subscriber(): HasMany 
    {
        return $this->hasMany(Subscriber::class);
    }

    public function post(): HasMany 
    {
        return $this->hasMany(Post::class);
    }
}
