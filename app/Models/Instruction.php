<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Instruction extends Model
{
    use HasFactory, CrudTrait, SoftDeletes;

    protected $fillable = [
        'number_of_guards',
        'post_id',
        'shift_id',
    ];

    protected $dates = ['deleted_at'];

}
