<?php

namespace App\Models\Subscriber\Traits;

use App\Models\Website\Website;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait Relations
{
    public function website(): BelongsTo 
    {
        return $this->belongsTo(Website::class);
    }
}
