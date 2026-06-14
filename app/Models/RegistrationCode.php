<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistrationCode extends Model
{
    protected $table = 'registration_code';
    protected $fillable = [
        'id',
        'code',
        'is_used',
        'created_at',
        'updated_at'
    ];
}
