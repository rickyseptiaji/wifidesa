<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Client;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil parameter pencarian dan tanggal
        $search = $request->input('search');
        $from = $request->input('from');
        $to = $request->input('to');

        // Query untuk mendapatkan klien dengan pagination
        $clients = Client::with('bills')
        ->whereHas('bills', function ($q) use ($from, $to) {
            $q->whereBetween('tgl_tagihan', [$from, $to]);
        })
            ->when($search, function ($query) use ($search) {
                return $query->where('nama', 'like', "%{$search}%")
                    ->orWhere('alamat', 'like', "%{$search}%")
                    ->orWhere('telp', 'like', "%{$search}%");
            })
            ->paginate(10) // Menggunakan pagination
            ->appends(['search' => $search, 'from' => $from, 'to' => $to]); // Melampirkan parameter untuk pagination

        // Mengembalikan tampilan dengan data klien
        return view('bills.index', compact('clients', 'search', 'from', 'to'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bill $bill)
    {
        $clients = $bill->client;
        return view('bills.edit', compact('bill', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bill $bill)
    {
        $request->validate([
            'tgl_pembayaran' => 'nullable|date',
            'pembayaran' => 'required'
        ]);
        $bill->update($request->all());
        return redirect()->route('bills.index')->with('success', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bill $bill)
    {
        //
    }
}
