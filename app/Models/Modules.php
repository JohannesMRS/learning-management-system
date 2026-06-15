<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modules extends Model
{
    protected $table = 'modules';

    protected $fillable = [
        'id_module',
        'id_kelas',
        'nama_module',
        'deskripsi'
    ];
}
