<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
	protected $primaryKey = 'id_siswa';
    protected $fillable = [
        'no_induk_siswa','id_kelas','nama_siswa','tempat_lahir','tanggal_lahir','jenis_kelamin','golongan_darah','alamat','foto','telepon','agama',
    ];
    
}
