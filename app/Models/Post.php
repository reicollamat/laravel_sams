<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, CrudTrait, SoftDeletes;

    // relationship with location
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    // relationship with shift
    public function shift()
    {
        return $this->hasMany(Shift::class);
    }

    protected $fillable = [
        'place',
        'remarks',
        'is_armed',
        'locations_id',
    ];

    protected $dates = ['deleted_at'];

}
