<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $table = 'tugas';
    protected $fillable = ['judul', 'mapel_id', 'waktu', 'pembuat', 'jenis_tugas'];
}
