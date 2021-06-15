<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{

    protected $table = 'mapel';
    protected $fillable = ['mapel_nama'];

    public function guru()
    {
        return $this->hasMany(Guru::class);
    }
    public function materi()
    {
        return $this->hasMany(Materi::class);
    }
    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }
}
