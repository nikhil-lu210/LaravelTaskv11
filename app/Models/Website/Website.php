<?php

namespace App\Models\Website;

use App\Models\Website\Traits\Relations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory, Relations;

    protected $filllable = [
        'name',
        'url'
    ];
}
