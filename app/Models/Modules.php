<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;

class Modules extends Model
{
    protected $table = 'modules';

    protected $primaryKey = 'id_module';

    protected $fillable = [
        'id_module',
        'id_kelas',
        'nama_module',
        'deskripsi'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
}
