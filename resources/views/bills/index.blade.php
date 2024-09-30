@extends('layouts.main')
@section('title', 'Tagihan')
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
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Pembayaran</li>
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
              <div class="p-3 d-flex justify-content-between align-items-center">
                <h3>Data Tagihan</h3>
                <div class="d-flex align-items-center">
                    <div class="d-flex flex-column align-items-center mx-2">
                        <label for="start_date">Dari:</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ request('start_date') }}">
                    </div>
                    <div class="d-flex flex-column align-items-center mx-2">
                        <label for="end_date">Sampai:</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" value="{{ request('end_date') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
                <a href="{{ route('bills.create') }}" class="btn btn-primary">Tambah Tagihan</a>
            </div>
            
            
              <!-- /.card-header -->
              <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No Telp</th>
                        <th>Tagihan</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($bill as $bills)
                      <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $bills->client_id }}</td>
                          <td>{{ $bills->client->nama }}</td>
                          <td>{{ $bills->client->alamat }}</td>
                          <td>{{ $bills->client->telp }}</td>
                          <td>{{ $bills->tagihan }}</td>
                          <td>{{ $bills->tgl_pembayaran }}</td>
                          <td class="{{$bills->pembayaran === 'paid' ? 'text-success' : 'text-danger'}}">
                            {{$bills->pembayaran === 'paid' ? 'Lunas' : 'Belum'}}
                          </td>
                          <td>                        
                            <a href="{{route('bills.edit', $bills)}}" class="btn btn-warning">Ubah</a>
                            <form action="{{route('bills.destroy', $bills)}}" method="post" style="display: inline-block">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger" type="submit">Hapus</button>
                            </form></td>
                      </tr>
                  @endforeach
              </tbody>
            </table>

            
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