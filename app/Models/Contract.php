<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use HasFactory, CrudTrait, SoftDeletes;

    // relationship to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relationship to location
    public function location()
    {
        return $this->hasManyThrough(Location::class, Ddo::class);
    }

    protected $fillable = [
        'start_date',
        'years',
        'months',
        'is_finished',
        'link',
        'users_id',
        'issued_date',
        'daily_wage',
        'status',
    ];

    protected $dates = ['deleted_at'];
}
