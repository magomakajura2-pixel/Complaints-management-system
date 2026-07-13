<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    protected $table = 'user_logs';

    protected $fillable = [
        'userId',
        'username',
        'userip',
        'loginTime',
        'logout',
        'status',
    ];

    public $timestamps = false;
}
