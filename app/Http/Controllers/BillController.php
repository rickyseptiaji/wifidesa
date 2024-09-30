<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bill = Bill::all();
        return view('bills.index', compact('bill'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $client = Client::all();
        $bill = Bill::all();
        return view('bills.create', compact('client','bill'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'tagihan' => 'required|numeric',
            'tgl_pembayaran' => 'nullable|date',
            'pembayaran' => 'required'
        ]);
        Bill::create($request->all());
        return redirect()->route('bills.index')->with('success', 'Berhasil Menambahkan Data');
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
        return view('bills.edit', compact('bill'));
    }

    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request, Bill $bill)
     {
         $request->validate([
             'tagihan' => 'required|numeric',
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
        $bill->delete();
        return redirect()->route('bills.index')->with('success', 'Berhasil Hapus Data');
    }
}
