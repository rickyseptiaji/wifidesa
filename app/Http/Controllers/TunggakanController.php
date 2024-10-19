<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;

class TunggakanController extends Controller
{
    public function tunggakan(Request $request){
        $request->validate([
            'search' => 'nullable|string|max:255',
            'from' => 'nullable|date',
            'to' => 'nullable|date|after_or_equal:from'
        ]);
    
        $search = $request->input('search');
        $from = $request->input('from');
        $to = $request->input('to');
    
        $bill = Bill::query();
        if (empty($search) && empty($from) && empty($to)) {
            $bill->whereRaw('1=0');
        } else {
            $bill->where('pembayaran', 0);
                if ($from && $to) {
                    $bill->whereBetween('tgl_tagihan', [$from, $to]);
                }
                $bill->when($search, function ($query) use ($search) {
                    return $query->whereHas('client', function ($clientQuery) use ($search) {
                        $clientQuery->where('nama', 'like', "%{$search}%")
                            ->orWhere('alamat', 'like', "%{$search}%")
                            ->orWhere('telp', 'like', "%{$search}%");
                    });
                });
        }
        $bills = $bill->paginate(10)
                      ->appends(['search' => $search, 'from' => $from, 'to' => $to]);
    
        return view('tunggakan.index', compact('search', 'from', 'to', 'bills'));
    }
}
