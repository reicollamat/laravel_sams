<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shift extends Model
{
    use HasFactory, CrudTrait, SoftDeletes;

    // relationship with post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    protected $fillable = [
        'name',
        'address',
        'include',
        'contract_id',
    ];

    protected $dates = ['deleted_at'];

}
