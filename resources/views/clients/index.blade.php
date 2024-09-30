@extends('layouts.main')
@section('title', 'Client')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Client</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Client</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="p-3 d-flex justify-content-between">
                <h3 class="">Data Client</h3>
                <a href="{{route('clients.create')}}" class="btn btn-primary">Tambah Client</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telp</th>
                    <th>Paket</th>
                    <th>Tarif</th>
                    <th>Tanggal Aktivasi</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($client as $item)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$item->nama}}</td>
                      <td>{{$item->alamat}}</td>
                      <td>{{$item->telp}}</td>
                      <td>{{$item->paket}}</td>
                      <td>{{$item->tarif}}</td>
                      <td>{{$item->tgl_aktivasi}}</td>
                      <td>
                        <a href="{{route('clients.edit', $item)}}" class="btn btn-warning">Ubah</a>
                        <form action="{{route('clients.destroy', $item)}}" method="post" style="display: inline-block">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit">Hapus</button>
                        </form>
                      </td>
                    </tr>  
                    @endforeach

                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>  
  
@endsection