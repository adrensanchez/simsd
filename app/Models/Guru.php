<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{	
    protected $primaryKey = 'id_guru';
    protected $fillable = [
        'id_guru',
        'no_induk_guru',
        'id_matpel',
        'nama_guru',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'email',
        'foto',
    ];

    
    public function matpel()
    {
        return $this->belongsTo('\App\Models\Matpel', 'id_matpel', 'id_matpel');
    }
}
