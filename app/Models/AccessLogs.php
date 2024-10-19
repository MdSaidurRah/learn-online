<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Model;

class AccessLogs extends Model
{
    protected $table = 'access_logs';
    public $timestamps = false;
    protected $fillable = [
        'userId', 'actionName', 'workingDomain', 'note', 'reference'
    ];
}
