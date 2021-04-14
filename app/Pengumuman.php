<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $dates = ['pengumuman_tanggal'];
    protected $table = 'pengumuman';
    protected $fillable = ['pengumuman_id', 'pengumuman_judul', 'pengumuman_deskripsi', 'pengumuman_tanggal', 'pengumuman_author'];
}
