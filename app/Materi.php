<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{

    protected $table = 'materi';

    protected $fillable = ['materi', 'deskripsi', 'kelas_id', 'file_materi', 'link_materi'];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
