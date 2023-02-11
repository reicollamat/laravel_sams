<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guard extends Model
{
    use HasFactory, CrudTrait, SoftDeletes;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'birthdate',
        'sex',
        'address',
        'nbi_clearnace_id',
        'phone_number',
        'educational_attainment',
        'lesp_id',
        'sss',
        'agency_affiliation_date',
        'nbi_issued_date',
    ];

    protected $dates = ['deleted_at'];

}
