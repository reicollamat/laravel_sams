<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, CrudTrait, SoftDeletes;

    protected $fillable = [
        'place',
        'remarks',
        'is_armed',
        'locations_id',
    ];

    protected $dates = ['deleted_at'];

}
