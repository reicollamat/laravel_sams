<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ddo extends Model
{
    use HasFactory, CrudTrait, SoftDeletes;

    protected $fillable = [
        'date_issued',
        'start_date',
        'operations_manager',
        'validity',
        'link',
        'is_finished',
        'locations_id',
    ];

    protected $dates = ['deleted_at'];
    
}
