<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoalEssay extends Model
{
    protected $table = 'soal_essay';
    protected $fillable = ['tugas_id', 'soal', 'gambar'];

    public function tugas()
    {
        return $this->belongsTo(Tugas::class);
    }
}
