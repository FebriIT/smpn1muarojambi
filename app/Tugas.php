<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $table = 'tugas';
    protected $fillable = ['judul', 'mapel_id', 'waktu', 'guru_id', 'jenis_tugas'];
    public function kelas()
    {
        return $this->belongsToMany('App\Kelas', 'kelas_tugas', 'tugas_id');
    }
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
}
