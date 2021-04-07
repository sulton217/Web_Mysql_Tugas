<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    //
    protected $table = 'tabel_absensi';
    protected $fillable = ['kode_absensi','id_pegawai','id_jabatan','id_bagian','tgl_absensi','waktu_kehadiran','keterangan_absensi']; 
}
