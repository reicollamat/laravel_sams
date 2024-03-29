<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use HasFactory, CrudTrait, SoftDeletes;

    // relationship with user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relationship with location
    public function location()
    {
        return $this->hasOne(Location::class);
    }

    protected $fillable = [
        'start_date',
        'years',
        'end_date',
        'is_finished',
        'number_of_guards',
        'user_id',
        'issued_date',
        'daily_wage',
        'status',
    ];

    protected $dates = ['deleted_at'];
}
