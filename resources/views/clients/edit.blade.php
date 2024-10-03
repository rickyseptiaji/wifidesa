@extends('layouts.main')
@section('title', 'Ubah Client')
@section('content')
<section class="flex-grow-1 container-p-y">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card px-3">
          <div class="p-3 d-flex justify-content-between">
            <h3 class="">Ubah Client</h3>
          </div>
          <!-- /.card-header -->
          <form action="{{route('clients.update', $client->id)}}" method="post">
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
              <label for="formGroupExampleInput" class="form-label">Nama</label>
              <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama" name="nama" value="{{$client->nama}}" required>
            </div>
            <div class="mb-3">
              <label for="formGroupExampleInput2" class="form-label">Alamat</label>
              <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Alamat" name="alamat" value="{{$client->alamat}}" required>
            </div>
            <div class="mb-3">
              <label for="formGroupExampleInput3" class="form-label">Telp</label>
              <input type="number" class="form-control" id="formGroupExampleInput3" placeholder="No Telp" name="telp" value="{{$client->telp}}" required>
            </div>
            <div class="mb-3">
              <label for="category">Paket:</label>
              <select name="paket" id="pakert" class="form-control" required>
                <option value="1" {{ $client->paket == '1' ? 'selected' : '' }}>1</option>
                <option value="2" {{ $client->paket == '2' ? 'selected' : '' }}>2</option>
                <option value="3" {{ $client->paket == '3' ? 'selected' : '' }}>3</option>
                <option value="4" {{ $client->paket == '4' ? 'selected' : '' }}>4</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="formGroupExampleInput3" class="form-label">Tarif</label>
              <input type="number" class="form-control" id="formGroupExampleInput3" placeholder="Tarif" name="tarif" required value="{{$client->tarif}}">
            </div>
            <div class="mb-3">
              <label for="formGroupExampleInput3" class="form-label">Tanggal Aktivasi</label>
              <input type="date" class="form-control" id="formGroupExampleInput3" placeholder="Tanggal Aktivasi" name="tgl_aktivasi" required value="{{$client->tgl_aktivasi}}">
            </div>
            <a href="{{route('clients.index')}}" class="btn btn-warning"><i class="bx bx-arrow-back"></i></a>
            <button class="btn btn-primary" type="submit"><i class="bx bx-save"></i></button>
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
