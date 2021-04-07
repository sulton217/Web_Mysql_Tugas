@extends('layouts.master')

@section('content')

<div class="main-panel">
    <div class="content mt-4">
        <div class="container-fluid">
            <h4 class="page-title">Absensi</h4>

            <!--PAKET TABLE PAKET TABLE PAKET TABLE PAKET TABLE-->
            <div class="card col-xs-12">
                <div class="card-body">

                    @if($message = Session::get('sukses'))
                    <div class="mb-3 alert alert-success alert-block">
                        <button class="close" type="button" data-dismiss="alert">x</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                        
                    <div class="table-responsive">
                        <!-- <table class="table table-hover"> -->
                        <div id="paket_wrapper" class="dataTables_wrapper no-footer">
                            <a class="btn btn-primary mb-3" href="/absensi/tambah">Tambah Absensi Baru</a>
                            <table id="absensi" class="table mb-3 table-striped table-hover table-paket table-setting dataTable table-bordered no-footer" style="width:100%" role="grid" aria-describedby="paket_info">
                                <thead class="thead-dark">
                                    <tr role="row">
                                        <th scope="col" class="sorting_asc" tabindex="0" aria-controls="paket" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending">
                                            #
                                        </th>
                                        <th scope="col" class="sorting" tabindex="0" aria-controls="paket" rowspan="1" colspan="1" aria-label="First: activate to sort column ascending">
                                            Nama Pegawai
                                        </th>
                                        <th scope="col" class="sorting" tabindex="0" aria-controls="paket" rowspan="1" colspan="1" aria-label="First: activate to sort column ascending">
                                            Tanggal Absensi
                                        </th>
                                        <th scope="col" class="sorting" tabindex="0" aria-controls="paket" rowspan="1" colspan="1" aria-label="First: activate to sort column ascending">
                                            Waktu Kehadiran
                                        </th>
                                        <th scope="col" class="sorting" tabindex="0" aria-controls="paket" rowspan="1" colspan="1" aria-label="First: activate to sort column ascending">
                                            Keterangan
                                        </th>
                                        <th scope="col" class="sorting" tabindex="0" aria-controls="paket" rowspan="1" colspan="1" aria-label="First: activate to sort column ascending">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php $i=1; @endphp
                                    @foreach($absensi as $absen)
                                    <tr role="row" class="data-row">
                                        <td>{{$i++}}</td>
                                        <td>{{$absen->nama}}</td>
                                        <td>{{$absen->tanggal}}</td>
                                        <td>{{$absen->hadir}}</td>
                                        <td>{{$absen->ket}}</td>
                                        <input type="hidden" value="{{ $absen->id }}" class="id">
                                        <td>
                                            <a href="/absensi/edit/{{$absen->id}}" class="btn btn-warning btn-sm">Edit</a>  
                                            <a class="btn peg-delete btn-sm btn-danger" onclick="return setIdDelUser({{$absen->id}}, '{{$absen->nama}}')">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


                 <!-- Start Modal Delete -->

        <div id="myModalDelete" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 id="myModalLabel1">Delete User</h4>
                        </div>
                        <div class="modal-body text-center">
                            <p id="modal-delete-nama"></p>
                        </div>
                    <div class="modal-footer d-flex justify-content-center align-content-center">
                        <form action="/absensi/delete" method="post" id="delete-form">
                            {{ csrf_field() }}
                            <input type="hidden" id="modal-delete-id" name="id">
                            <button type="submit" class="btn btn-danger btn-sm" id="delete-btn">Delete</button>
                        </form>
                            <btn class="btn btn-secondary btn-sm" data-dismiss="modal" aria-hidden="true">Cancel</btn>
                    </div>
                </div>
            </div>
        </div>

        <!-- /End Modal Delete -->


        </div>
    </div>
</div>         
@endsection

