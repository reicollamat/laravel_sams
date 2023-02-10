<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $fillable = [
        'name',
        'address',
        'include',
        'contract_id',
    ];
}
