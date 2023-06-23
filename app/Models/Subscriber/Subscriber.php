<?php

namespace App\Models\Subscriber;

use App\Models\Subscriber\Traits\Relations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory, Relations;

    protected $fillable = [
        'website_id',
        'name',
        'email'
    ];
}
