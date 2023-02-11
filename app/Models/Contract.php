<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use HasFactory, CrudTrait, SoftDeletes;

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
