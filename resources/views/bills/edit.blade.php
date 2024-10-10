@extends('layouts.main')
@section('title', 'Tambah Client')
@section('content')
<section class="flex-grow-1 container-p-y">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card px-3">
          <div class="p-3 d-flex justify-content-between">
            
            <h3 class="">Ubah Tagihan</h3>
          </div>
          <!-- /.card-header -->
          <form action="{{route('bills.update', $bill->id)}}" method="post">
            @csrf
            @method('PUT')
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required value="{{$clients->nama}}" readonly>
          </div>
            <div class="mb-3">
              <label for="tagihan" class="form-label">Tagihan</label>
              <input type="number" class="form-control" id="tagihan" name="tarif" required value="{{$clients->tarif}}" readonly>
            </div>
            <div class="mb-3">
              <label for="tgl_pembayaran" class="form-label">Tanggal Pembayaran</label>
              <input type="date" class="form-control" id="tgl_pembayaran" name="tgl_pembayaran" value="{{ $bill->tgl_pembayaran ?? '' }}">
            </div>
            <div class="form-group">
              <label for="pembayaran">Status Pembayaran</label>
              <select class="form-control" id="pembayaran" name="pembayaran">
                  <option value="1" {{ $bill->pembayaran == '1' ? 'selected' : '' }}>Sudah</option>
                  <option value="0" {{ $bill->pembayaran == '0' ? 'selected' : '' }}>Belum</option>
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
@endsection
