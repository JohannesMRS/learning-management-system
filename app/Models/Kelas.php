<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Modules;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    protected $fillable = [
        'id_kelas',
        'id_user',
        'nama_kelas',
        'deskripsi'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function modules(){
        return $this->hasMany(Modules::class, 'id_kelas');
    }
}
