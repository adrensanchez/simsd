<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class matpel extends Model
{
    protected $primaryKey = 'id_matpel';
    protected $fillable = [
        'id_matpel',
        'kode_matpel',
        'nama_matpel',
        'kkm',
    ];
}
