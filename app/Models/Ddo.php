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
        'approved_date',
        'start_date',
        'operations_manager',
        'validity',
        'link',
        'is_finished',
        'contract_id',
    ];

    protected $dates = ['deleted_at'];
    
}
