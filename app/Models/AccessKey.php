<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessKey extends Model
{
    use HasFactory;

    protected $fillable = [
        'acount_name',
        'consumer_key',
        'consumer_secret',
        'access_token',
        'access_token_secret',
        'account_active',
    ];
}