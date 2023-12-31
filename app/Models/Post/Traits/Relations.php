<?php

namespace App\Models\Post\Traits;

use App\Models\Website\Website;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait Relations
{
    public function website(): BelongsTo 
    {
        return $this->belongsTo(Website::class);
    }
}
