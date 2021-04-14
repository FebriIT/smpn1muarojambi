<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $primaryKey = 'id_kelas';
    protected $table = 'kelas';
    protected $fillable = ['nama_kelas'];
}
