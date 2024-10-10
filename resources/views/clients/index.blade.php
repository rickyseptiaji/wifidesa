@extends('layouts.main')

@section('title', 'Client')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">Client</h5>
        <div>
          <form action="{{ route('clients.index') }}" method="GET" class="d-flex px-2">
            <input type="text" name="search" class="form-control me-2" placeholder="Cari Nama, Alamat, Telp.." value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Cari</button>
          </form>
          <a href="{{ route('clients.create') }}" class="btn btn-success my-2 mx-2">Tambah Client</a>
        </div>
        <div class="table-responsive text-nowrap">
          <table class="table">
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
                  <td>{{$item->paket}}</td>
                  <td>Rp {{number_format($item->tarif, 2, ',', '.')}}</td>
                  <td>{{$item->tgl_aktivasi}}</td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('clients.edit', $item)}}"
                          ><i class="bx bx-edit-alt me-1"></i> Edit</a>
                          <form action="{{ route('clients.destroy', $item) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="dropdown-item">
                               <i class="bx bx-trash me-1"></i> Delete
                            </button>
                         </form>
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
