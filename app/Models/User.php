<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use \Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, CrudTrait, SoftDeletes;

    // relationship to contract
    public function contract()
    {
        return $this->hasMany(Contract::class);
    }
    // public function location()
    // {
    //     return $this->hasOneThrough(Location::class,Contract::class);
    // }
    // public function posts()
    // {
    //     // return $this->hasManyThrough(
    //     //     Post::class,
    //     //     Location::class,
    //     //     'contract_id',
    //     //     'location_id',
    //     //     'id',
    //     //     'id',
    //     // );
    //     // return $this->hasManyDeep();
    // }
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'first_name',
        'last_name',
        'phone_number',
        'birth_date',
        'organization_address',
        'organization_name',
        'sex',
        'position',
        'date_joined',
        'last_login'
    ];

    // Soft Delete
    protected $dates = ['deleted_at'];

    // protected $primaryKey = 'guid';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean'
    ];


}