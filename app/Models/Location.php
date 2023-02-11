<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use HasFactory, CrudTrait, SoftDeletes;

    // relationship to contract
    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }

    protected $fillable = [
        'locations_name',
        'address',
        'include',
        'users_id',
    ];

    protected $dates = ['deleted_at'];

}
