<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Client;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    
    public function index(){
        $client = Client::count();
        $tagihan = Bill::where('pembayaran', 0)->count();
        $tunggakan = Bill::where('pembayaran', 0)
        ->whereMonth('tgl_tagihan', now()->subMonth()->month)
        ->whereYear('tgl_tagihan', now()->subMonth()->year)  
        ->count();

        return view('home', compact('client','tagihan', 'tunggakan'));
    }
}
