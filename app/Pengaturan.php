<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    protected $table = 'pengaturan';
    protected $fillable = ['judul', 'deskripsi', 'gambar'];

    public function getGambar()
    {
        if (!$this->gambar) {
            return asset(public_path() . '/public/pengaturan/default.jpg');
        }
        return asset(public_path() . '/storage/pengaturan/visimisi/' . $this->gambar);
    }
}
