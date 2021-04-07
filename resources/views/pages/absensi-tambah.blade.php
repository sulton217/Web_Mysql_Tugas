@extends('layouts.master')

@section('content')

<div class="main-panel">
    <div class="content mt-4">
        <div class="container-fluid">
            <h4 class="page-title">Tambah Absen Baru</h4>
            
            <!--FORM TAMBAH FORM TAMBAH FORM TAMBAH FORM TAMBAH FORM TAMBAH-->
            <div class="col-xs-12 mt-4" id="tambah-blog">
                <div class="card">
                <div class="card-header  bg-darkblue">
                        <div class="card-title">
                            <h5>Absen Pegawai</h5>
                        </div>
                    </div>
                    <div class="card-body">
                    @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                        {{$error}}<br>
                        @endforeach
                    </div>
                    @endif

                    <form action="/absensi/store" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            
                        <div class="form-group">
                            <label for="pegawai">Pegawai</label>
                            <select class="form-control input-square" id="pegawai" name="pegawai" required>
                                @foreach($pegawai as $p)
                                <option value="{{$p->id_pegawai}}">{{$p->nama_pegawai}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan Absen</label>
                            <textarea class="form-control keterangan" id="keterangan" name="keterangan" style="height:150px;" placeholder="Kosongkan jika tidak diperlukan..."></textarea>
                        </div>
                        <input type="submit" class="btn btn-md btn-primary my-3 d-block" value="Absen Sekarang"></input>
                    </form>
                    </div>
                </div>
            </div>
            
    </div>
</div>
</div>

@endsection