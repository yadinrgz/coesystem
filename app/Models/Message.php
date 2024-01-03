<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'from',
        'to',
        'message',
        'is_read',
    ];

    public function from_user()
    {
        return $this->hasOne('App\Models\User', 'id', 'from');
    }
}
