@extends('template')

@section('title','- Manage Karyawan')

@section('konten')
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Manage Karyawan</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            @if (Session::has('success'))
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('success') }}
            </div>
            @endif
            @if (Session::has('failed'))
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('failed') }}
            </div>
            @endif
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-md-12">
            <a href="/{{ Session('user')['role'] }}/manage-karyawan/create">
                <button class="btn btn-primary btn-block">Tambah</button>
            </a>
        </div>
    </div>
    <!-- /row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title m-b-0">Data Karyawan</h3>
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Email</th>
                                <th>Tanggal Mulai Bekerja</th>
                                <th>Posisi</th>
                                <th>Divisi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            @foreach($karyawan as $item)
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$item->nama_pegawai}}</td>
                                <td>{{$item->nik}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->created_at->translatedFormat('d M Y')}}</td>
                                <td>{{$item->nama_jabatan}}</td>
                                <td>{{$item->nama_divisi}}</td>
                                <th>
                                    <a class="ml-auto mr-auto" href="/{{ Session('user')['role'] }}/manage-karyawan/{{$item->id}}/edit">
                                        <button class="btn btn-warning ml-auto mr-auto">Edit</button>
                                    </a>
                                    <form class="ml-auto mr-auto mt-3" method="POST" action="/{{ Session('user')['role'] }}/manage-karyawan/{{$item->id}}">
                                        {{ csrf_field() }}
                      @method("DELETE")

                                        {{-- {{ method_field('DELETE') }} --}}

                                        <button class="btn btn-danger ml-auto mr-auto">Delete</button>
                                    </form>
                                </th>
                            </tr>
                            <?php $no++ ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /.row -->
@endsection
