@extends('layouts.main')

@section('title', 'Bills')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">Tagihan</h5>
        <div>
          <form action="{{ route('bills.index') }}" method="GET" class="d-flex px-2">
            <input type="text" name="search" class="form-control me-2" placeholder="Cari Nama, Alamat, Telp.." value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Cari</button>
          </form>
          {{-- <a href="{{ route('bills.create') }}" class="btn btn-success my-2 mx-2">Tambah Client</a> --}}
        </div>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telp</th>
                <th>Tarif</th>
                <th>Tanggal Tagihan</th>
                <th>Tanggal Pembayaran</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @if ($clients->isEmpty())
              <tr>
                <td colspan="8" class="text-center">Tidak ada data</td>
            </tr>
              @else
              @foreach ($clients as $item)
              <tr>
                  <td>{{($clients->currentPage() - 1) * $clients->perPage() + $loop->iteration}}</td>
                  <td>{{$item->nama}}</td>
                  <td>{{$item->alamat}}</td>
                  <td>{{$item->telp}}</td>
                  <td>{{$item->tarif}}</td>
                  @foreach ($item->bills as $bill)
                      <td>{{$bill->tgl_tagihan}}</td>
                      <td>{{$bill->tgl_pembayaran}}</td>  
                      <td><span class="{{$bill->pembayaran == 0 ? 'badge bg-label-danger' : 'badge bg-label-success'}}">{{$bill->pembayaran == 0 ? 'Belum' : 'Lunas'}}</span></td>
                  @endforeach
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('bills.edit', $item)}}">
                          <i class="bx bx-edit-alt me-1"></i> Edit</a>
                          <a class="dropdown-item" href="{{route('bills.edit', $item)}}">
                            <i class="bx bx-printer me-1"></i> Invoice</a>
                            <a class="dropdown-item" href="{{route('bills.edit', $item)}}">
                              <i class="bx bxs-printer me-1"></i> Bills</a>
                          {{-- <form action="{{ route('bills.destroy', $item) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="dropdown-item">
                               <i class="bx bx-trash me-1"></i> Delete
                            </button>
                         </form> --}}
                      </div>
                    </div>
                  </td>
                </tr>
              @endforeach
              @endif
            </tbody>
        </table>
        {{$clients->links()}}
        </div>
      </div>
</div>

@endsection
