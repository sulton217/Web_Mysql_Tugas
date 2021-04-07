<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Absensi;
use App\Pegawai;

class AbsensiController extends Controller
{
    //
    public function absensi(){
        //mengambil data dari tabel absensi dan dijoin dengan tabel pegawai
        $absensi = Absensi::join('tabel_pegawai','tabel_pegawai.id_pegawai', '=', 'tabel_absensi.id_pegawai')
            ->orderByRaw('tabel_absensi.tgl_absensi DESC')
            //diurutkan berdasarkan tanggal absen
        //  ->where('paket.id','=',$id)
            ->get([
                'tabel_pegawai.nama_pegawai as nama',
                'tabel_absensi.tgl_absensi as tanggal',
                'tabel_absensi.id as id',
                'tabel_absensi.waktu_kehadiran as hadir',
                'tabel_absensi.keterangan_absensi as ket'
            ]);

            //langsung menuju view di folder pages/absensi.blade.php
        return view('pages/absensi',['absensi'=>$absensi]);
    }

    public function testtime(){
        $starttime = '07:36';
        $stoptime = '17:00';
        //variabel waktu
        $diff = (strtotime($stoptime) - strtotime($starttime));
        $total = $diff/60;
        //menemukan total perbandingan
        echo sprintf("%02dh %02dm", floor($total/60), $total%60);
        //menampilkan
    }

    


    //////////////////////////////////////////////////////////////////////////////
    //////Tambah Paket Baru
    public function tambah(){
        //mencari semua nama pegawai
        $pegawai = Pegawai::all();
        //menuju view difolder pages / absensi-tambah.blade.php
        return view('pages/absensi-tambah',compact('pegawai'));
    }

    public function store(Request $request){

        //script untuk menambah data di tabel absensi
        $data = Absensi::create([
            //mengisi id pegawai dengan inputan di select dengan name pegawai
            'id_pegawai' => $request->pegawai,
            'id_jabatan' => 'JBT_001',
            'id_bagian' => 'BGN_001',
            'tgl_absensi' => date('Y-m-d'),
            'waktu_kehadiran' => date('H:i:s'),
            'keterangan_absensi' => $request->keterangan
        ]);

        //menuju route /absensi dengan notif session sukses data berhasil ditambahkan
        return redirect('/absensi')->with('sukses','Data berhasil ditambahkan');
    }

    public function edit($id){
        //mencari data tabel absensi dengan id yang diklik
        $pegawai = Absensi::join('tabel_pegawai','tabel_pegawai.id_pegawai', '=', 'tabel_absensi.id_pegawai')
            ->orderByRaw('tabel_absensi.tgl_absensi DESC')
            ->where('tabel_absensi.id','=',$id)
            ->get([
                'tabel_pegawai.nama_pegawai as nama',
                'tabel_absensi.tgl_absensi as tanggal',
                'tabel_absensi.id as id',
                'tabel_absensi.waktu_kehadiran as hadir',
                'tabel_absensi.keterangan_absensi as ket'
            ]);

        return view('/pages/absensi-edit',compact('pegawai'));
    }

    public function update($id,Request $request){

        //find data absen yang akan diupdate
        $absen = Absensi::find($id);
        
        /////update absensi
        
        $absen->tgl_absensi = $request->tanggal;
        $absen->waktu_kehadiran = $request->hadir;
        $absen->keterangan_absensi = $request->keterangan;
        //simpan update
        $absen->save();

        return redirect('/absensi')->with('sukses','Data berhasil diubah');
    }

    
    ///////////////////////////////////////////////////////////////////////////////////
    ///////////////////
    //hapus destinasi
    public function delete(Request $request){
        //find data absen yang akan didelete
        $absen = Absensi::find($request->id);
        //hapus data
        $absen->delete();
        
        return redirect('/absensi')->with('sukses','Data berhasil dihapus');
    }

}
