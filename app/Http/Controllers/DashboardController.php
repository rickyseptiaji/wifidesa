<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Client;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    
    public function index(){
        $clientCount = Client::count();
        $billsCount = Bill::count();

        return view('home', compact('clientCount', 'billsCount'));
    }
}
