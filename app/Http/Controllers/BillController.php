<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Client;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    // Validasi input
    $request->validate([
        'search' => 'nullable|string|max:255',
        'from' => 'nullable|date',
        'to' => 'nullable|date|after_or_equal:from',
    ]);

    // Ambil parameter pencarian dan tanggal
    $search = $request->input('search');
    $from = $request->input('from');
    $to = $request->input('to');

    // Jika tidak ada parameter filter, buat query kosong
    $clientsQuery = Client::query();

    if (empty($search) && empty($from) && empty($to)) {
        $clientsQuery->whereRaw('1=0');
    } else {
        // Query untuk mendapatkan klien dengan pagination
        $clientsQuery->with(['bills' => function ($q) use ($from, $to) {
            if ($from && $to) {
                $q->whereBetween('tgl_tagihan', [$from, $to]);
            }
        }])
        ->when($search, function ($query) use ($search) {
            return $query->where('nama', 'like', "%{$search}%")
                ->orWhere('alamat', 'like', "%{$search}%")
                ->orWhere('telp', 'like', "%{$search}%");
        });
    }

    // Pagination
    $clients = $clientsQuery->paginate(10)
        ->appends(['search' => $search, 'from' => $from, 'to' => $to]);

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
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
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
    public function destroy()
    {
        //
    }

    public function generateInvoice(Bill $bill)
    {
        // Ambil client dari bill
        $client = $bill->client; // Ambil client yang terkait dengan bill

        // Ambil semua bill terkait client yang belum dibayar
        $unpaidBills = $client->bills()->where('pembayaran', 0)->get();
        // Ambil tgl tagihan terbaru
        $curentTagihan = $client->bills()->orderBy('tgl_tagihan', 'desc')->get();
        // Hitung total tarif berdasarkan jumlah tagihan yang belum dibayar
        $jumlahTagihan = $unpaidBills->count(); // Menghitung jumlah tagihan
        $totalTarif = $client->tarif * $jumlahTagihan; // Mengalikan tarif dengan jumlah tagihan

        // Generate PDF
        $pdf = Pdf::loadView('bills.invoice', compact('bill', 'client', 'unpaidBills', 'totalTarif', 'curentTagihan'));

        // Download PDF
        return $pdf->download('invoice.pdf');
    }

    public function generateKwitansi(Bill $bill){
        $client = $bill->client;

        $paidBills = $client->bills()->where('pembayaran', 1)->get();
        // return view('bills.kwitansi', compact('client', 'bill', 'tanggal', 'tahun'));
        $pdf = PDF::loadView('bills.kwitansi', compact('client', 'bill'));
        return $pdf->download('kwitansi.pdf');
    }
}
