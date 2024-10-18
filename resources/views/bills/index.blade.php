@extends('layouts.main')

@section('title', 'Bills')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <h5 class="card-header">Tagihan</h5>
    <div>
      <form action="{{ route('bills.index') }}" method="GET" class="d-flex px-2">
        
        <!-- Input tanggal dari -->
        <input type="date" name="from" class="form-control me-2" value="{{ request('from') }}">
        
        <!-- Input tanggal sampai -->
        <input type="date" name="to" class="form-control me-2" value="{{ request('to') }}">
        
        <!-- Input search -->
        <input type="text" name="search" class="form-control me-2" placeholder="Cari Nama, Alamat, Telp.." value="{{ request('search') }}">
        
        <button type="submit" class="btn btn-primary">Cari</button>
      </form>
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
              <td colspan="9" class="text-center">Tidak ada data</td>
            </tr>
          @else
            @foreach ($clients as $client)
              <tr>
                <td>{{ ($clients->currentPage() - 1) * $clients->perPage() + $loop->iteration }}</td>
                <td>{{ $client->nama }}</td>
                <td>{{ $client->alamat }}</td>
                <td>{{ $client->telp }}</td>
                <td>Rp {{ number_format($client->tarif, 0, ',', '.') }}</td>

                @if ($client->bills->isEmpty())
                  <!-- Jika tidak ada tagihan -->
                  <td colspan="3" class="text-center">
                    <span class="badge bg-label-warning">Belum Ada Tagihan</span>
                  </td>
                @else
                  <!-- Menampilkan tagihan dan status pembayaran -->
                  @php
                    $firstBill = $client->bills->first();
                  @endphp
                  <td>{{ \Carbon\Carbon::parse($firstBill->tgl_tagihan)->format('d/m/Y') }}</td>
                  <td>{{ $firstBill->tgl_pembayaran ? \Carbon\Carbon::parse($firstBill->tgl_pembayaran)->format('d/m/Y') : '-' }}</td>
                  <td>
                    <span class="{{ $firstBill->pembayaran == 0 ? 'badge bg-label-danger' : 'badge bg-label-success' }}">
                      {{ $firstBill->pembayaran == 0 ? 'Belum' : 'Lunas' }}
                    </span>
                  </td>
                @endif

                <!-- Aksi -->
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    @if ($client->bills->isNotEmpty())
                    <div class="dropdown-menu">
                      @foreach ($client->bills as $bill)
                      <a class="dropdown-item" href="{{ route('bills.edit', $bill->id) }}">
                        <i class="bx bx-edit-alt me-1"></i> Edit
                      </a>
                      <a class="dropdown-item" href="{{ route('bills.invoice', $client) }}">
                        <i class="bx bx-printer me-1"></i> Invoice
                      </a>
                      <a class="dropdown-item" href="{{route('bills.kwitansi', $bill->id)}}">
                        <i class="bx bxs-printer me-1"></i> Bills
                      @endforeach
                    </a>
                    @endif
                    </div>
                  </div>
                </td>
              </tr>
            @endforeach
          @endif
        </tbody>
      </table>

      <!-- Pagination Links -->
      {{ $clients->links() }}
    </div>
  </div>
</div>






@endsection
