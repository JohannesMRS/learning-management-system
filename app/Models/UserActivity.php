<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    protected $table = 'user_activity';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'id_user',
        'id_module',
        'accessed_at'
    ];
}
