<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Modules;

class UserActivity extends Model
{
    protected $table = 'user_activity';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'id_module',
        'accessed_at'
    ];

    public function module(){
        return $this->belongsTo(Modules::class, 'id_module', 'id_module');
    }
}
