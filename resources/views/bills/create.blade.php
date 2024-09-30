@extends('layouts.main')
@section('title', 'Tambah Client')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tagihan</h1>
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
              
              <h3 class="">Tambah Tagihan</h3>
            </div>
            <!-- /.card-header -->
            <form action="{{route('bills.store')}}" method="post">
              @csrf
              @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
              <div class="form-group">
                <label for="category">Pilih Client:</label>
                <select class="form-control" id="category" name="client_id">
                    @foreach($client as $clients)
                    <option value="{{ $clients->id }}">{{ $clients->nama }}</option>
                    @endforeach
                </select>
            </div>
              <div class="mb-3">
                <label for="tagihan" class="form-label">Tagihan</label>
                <input type="number" class="form-control" id="tagihan" placeholder="Tagihan" name="tagihan" required>
              </div>
              <div class="mb-3">
                <label for="tgl_pembayaran" class="form-label">Tanggal Pembayaran</label>
                <input type="date" class="form-control" id="tgl_pembayaran" placeholder="Tanggal Pembayaran" name="tgl_pembayaran">
              </div>
              <div class="form-group">
                <label for="category">Pembayaran</label>
                <select class="form-control" id="category" name="pembayaran">
                    <option value="paid">Sudah</option>
                    <option value="unpaid">Belum</option>
                </select>
            </div>
              <a href="{{route('bills.index')}}" class="btn btn-warning">Kembali</a>
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
