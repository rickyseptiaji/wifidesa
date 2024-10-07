<?php

namespace App\Console\Commands;

use App\Models\Bill;
use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Console\Command;

class GenerateMonthlyBills extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bills:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate monthly bills for all clients';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $clients = Client::all();
        foreach ($clients as $client) {
            Bill::create([
                'client_id' => $client->id,
                'tgl_tagihan' => Carbon::now(),
                'pembayaran' => false
            ]);
        //    $existingBill = Bill::where('client_id', $client->id)
        //                         ->whereMonth('tgl_tagihan', Carbon::now()->month)
        //                         ->whereYear('tgl_tagihan', Carbon::now()->year)
        //                         ->first();
        //         if ($existingBill) {

        //         }
        }
    }
}
