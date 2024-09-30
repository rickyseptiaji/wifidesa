@extends('layouts.main')
@section('title', 'Tambah Client')
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
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">DataTables</li>
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
          <div class="card px-3">
            <div class="p-3 d-flex justify-content-between">
              <h3 class="">Tambah Client</h3>
            </div>
            <!-- /.card-header -->
            <form action="{{route('clients.store')}}" method="post">
              @csrf
              <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Nama</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama" name="nama" required>
              </div>
              <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Alamat" name="alamat" required>
              </div>
              <div class="mb-3">
                <label for="formGroupExampleInput3" class="form-label">Telp</label>
                <input type="number" class="form-control" id="formGroupExampleInput3" placeholder="No Telp" name="telp" required>
              </div>
              <div class="mb-3">
                <label for="category">Paket:</label>
                <select class="form-control" id="category" name="paket" required>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>
              <div class="mb-3">
                <label for="formGroupExampleInput3" class="form-label">Tarif</label>
                <input type="number" class="form-control" id="formGroupExampleInput3" placeholder="Tarif" name="tarif" required>
              </div>
              <div class="mb-3">
                <label for="formGroupExampleInput3" class="form-label">Tanggal Aktivasi</label>
                <input type="date" class="form-control" id="formGroupExampleInput3" placeholder="Tanggal Aktivasi" name="tgl_aktivasi" required>
              </div>
              <a href="{{route('clients.index')}}" class="btn btn-warning">Kembali</a>
              <button class="btn btn-primary" type="submit">Simpan</button>
            </form>
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
