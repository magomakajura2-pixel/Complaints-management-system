<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'fullName',
        'userEmail',
        'password',
        'contactNo',
        'address',
        'State',
        'country',
        'pincode',
        'userImage',
        'status',
    ];

    protected $hidden = [
        'password',
    ];

    public $timestamps = false;

    public function complaints(): HasMany
    {
        return $this->hasMany(Complaint::class, 'userId');
    }
}
