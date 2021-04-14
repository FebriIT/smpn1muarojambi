<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table='agenda';
    protected $fillable=['agenda_id','agenda_nama','agenda_tanggal','agenda_deskripsi','agenda_mulai','agenda_selesai','agenda_tempat','agenda_waktu','agenda_keterangan','agenda_author'];
}
