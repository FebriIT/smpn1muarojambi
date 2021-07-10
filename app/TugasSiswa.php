<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TugasSiswa extends Model
{
    protected $table = 'tugas_siswa';
    protected $fillable = ['siswa_id', 'tugas_id'];
}
