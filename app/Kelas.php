<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{

    protected $table = 'kelas';
    protected $fillable = ['nama_kelas'];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
    public function materi()
    {
        return $this->hasMany(Materi::class);
    }
    public function tugas()
    {
        return $this->belongsToMany('App\Tugas', 'kelas_tugas', 'kelas_id');
    }
}
