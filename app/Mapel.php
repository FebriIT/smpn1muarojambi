<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $primaryKey = 'mapel_id';
    protected $table = 'mapel';
    protected $fillable = ['mapel_nama'];

    public function guru()
    {
        return $this->hasMany(Guru::class);
    }
}
