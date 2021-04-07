@extends('layouts.master')

@section('content')

<div class="main-panel">
    <div class="content mt-4">
        <div class="container-fluid">
            <h4 class="page-title">Edit Absen</h4>
            @foreach($pegawai as $p)
            
            <!--FORM TAMBAH FORM TAMBAH FORM TAMBAH FORM TAMBAH FORM TAMBAH-->
            <div class="col-xs-12 mt-4" id="tambah-blog">
                <div class="card">
                <div class="card-header  bg-darkblue">
                        <div class="card-title">
                            <h5>Absen Pegawai {{$p->nama}}</h5>
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

                    <form action="/absensi/update/{{ $p->id}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" required id="tanggal" name="tanggal" value="{{$p->tanggal}}">
                        </div>
                        
                        <div class="form-group">
                            <label for="hadir">Waktu Kehadiran</label>
                            <input type="time" class="form-control" required id="hadir" name="hadir" value="{{$p->hadir}}">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan Absen</label>
                            <textarea class="form-control keterangan" id="keterangan" name="keterangan" style="height:150px;" placeholder="Kosongkan jika tidak diperlukan...">{{$p->ket}}</textarea>
                        </div>
                        <input type="hidden" name="id" value="{{$p->id}}">
                        <input type="submit" class="btn btn-md btn-primary my-3 d-block" value="Absen Sekarang"></input>
                    </form>
                    </div>
                </div>
            </div>
            @endforeach
            
    </div>
</div>
</div>

@endsection