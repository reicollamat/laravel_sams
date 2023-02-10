<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $fillable = [
        'number_of_guards',
        'post_id',
        'shift_id',
    ];
}
