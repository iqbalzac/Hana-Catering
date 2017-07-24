<?php

namespace App\Listeners;

use App\Events\Pesanan;
use App\Mail\SimpanPesanan;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EmailPemesanan
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Pesanan  $event
     * @return void
     */
    public function handle(Pesanan $event)
    {
        \Mail::to($event->order->pelanggan->email)->send(new SimpanPesanan($event->order));
    }
}
