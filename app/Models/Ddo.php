<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ddo extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $fillable = [
        'date_issued',
        'start_date',
        'operations_manager',
        'validity',
        'link',
        'is_finished',
        'locations_id',
    ];
}
