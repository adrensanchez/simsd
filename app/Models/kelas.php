<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
	protected $primaryKey = 'id_kelas';
    protected $fillable = [
        'id_kelas',
        'id_guru',
        'nama_kelas',
        'aktif',
    ];
}
