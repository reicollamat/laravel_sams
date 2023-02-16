<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Firearm extends Model
{
    use HasFactory, CrudTrait, SoftDeletes;

    protected $fillable = [
        'kind',
        'caliber',
        'fas_SN',
        'validity_fas_license',
    ];
    protected $dates = ['deleted_at'];
}
