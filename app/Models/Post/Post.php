<?php

namespace App\Models\Post;

use App\Models\Post\Traits\Relations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, Relations;

    protected $fillable = [
        'website_id',
        'title',
        'description'
    ];
}
