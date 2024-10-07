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
        $clients = Client::all();
        $search = $request->input('search');

        $clients = Client::with('bills')
        ->when($search, function($query, $search) {
            return $query->where('nama', 'like', "%{$search}%")
                         ->orWhere('alamat', 'like', "%{$search}%")
                         ->orWhere('telp', 'like', "%{$search}%");
        })
        ->paginate(10)
        ->appends(['search' => $search]);
        return view('bills.index', compact('clients'));
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
