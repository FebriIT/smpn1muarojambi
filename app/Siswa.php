<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $primaryKey = 'id_siswa';
    protected $dates = ['creadted_at', 'tanggal_lahir'];
    protected $table = 'siswa';
    protected $fillable = ['nisn', 'nama_siswa', 'agama', 'jenis_kelamin', 'tanggal_lahir', 'avatar', 'user_id', 'kelas_id', 'kelas_nama'];

    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('images/default.png');
        }
        return asset('images/siswa/' . $this->avatar);
    }
}
