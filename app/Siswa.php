<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{

    protected $dates = ['creadted_at', 'tanggal_lahir'];
    protected $table = 'siswa';
    protected $fillable = ['nisn', 'nama_siswa', 'agama', 'jenis_kelamin', 'tanggal_lahir', 'avatar', 'user_id', 'kelas_id'];

    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('images/default.png');
        }
        return asset('storage/siswa/' . auth()->user()->email . '/' . $this->avatar);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
