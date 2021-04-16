<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{

    protected $dates = ['creadted_at', 'tanggal_lahir'];
    protected $table = 'guru';
    protected $fillable = ['nip_guru', 'nama_guru', 'user_id', 'mapel_id', 'jenis_kelamin', 'no_hp', 'tanggal_lahir', 'avatar'];

    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('images/default.png');
        }
        return asset('images/guru/' . $this->avatar);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
}
