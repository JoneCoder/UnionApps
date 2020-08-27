<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Geography\Upazila;
use App\Models\Geography\District;
use App\Models\Geography\Division;

class User extends Authenticatable
{
    use Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pin', 'options', 'username', 'union_code', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'username', 'password', 'remember_token',
    ];

    public function union()
    {
        return $this->hasOne(Information::class, 'code', 'union_code');
    }

    public function division()
    {
        return $this->hasOneThrough(
            Division::class,
            Information::class,
            'code',
            'id',
            'union_code',
            'division_id'
        );
    }

    public function district()
    {
        return $this->hasOneThrough(
            District::class,
            Information::class,
            'code',
            'id',
            'union_code',
            'district_id'
        );
    }

    public function upazila()
    {
        return $this->hasOneThrough(
            Upazila::class,
            Information::class,
            'code',
            'id',
            'union_code',
            'upazila_id'
        );
    }
}
