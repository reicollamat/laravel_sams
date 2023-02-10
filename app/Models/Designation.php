<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $fillable = [
        'designation_type',
        'day_off_day',
        'ddo_id',
        'guard_id',
    ];
}
