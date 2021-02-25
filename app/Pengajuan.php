<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = "pengajuan";

    protected $fillable = ['pegawai_id','tanggal_pengajuan','mulai','hingga','lama_cuti','unit_id','jabatan_id','status'];

}
