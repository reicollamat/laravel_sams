<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Backpack\CRUD\app\Models\Traits\CrudTrait;

class Contract extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $fillable = [
        'contracts_id',
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
}
