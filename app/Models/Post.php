<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $fillable = [
        'place',
        'remarks',
        'is_armed',
        'locations_id',
    ];
}
