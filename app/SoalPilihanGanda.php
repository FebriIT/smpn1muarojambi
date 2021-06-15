<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoalPilihanGanda extends Model
{
    protected $table = 'soal_pilgan';
    protected $fillable = ['tugas_id', 'soal', 'a', 'b', 'c', 'd', 'kunci', 'score', 'gambar'];
}
