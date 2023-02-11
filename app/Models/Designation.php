<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Designation extends Model
{
    use HasFactory, CrudTrait, SoftDeletes;

    protected $fillable = [
        'designation_type',
        'day_off_day',
        'ddo_id',
        'guard_id',
    ];

    protected $dates = ['deleted_at'];

}
