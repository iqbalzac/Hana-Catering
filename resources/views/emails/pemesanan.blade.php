@component('mail::message')
## Hai, {{ $order->pelanggan->nama }}

Pesanan makanan Anda dari {{ config('app.name') }} sudah kami simpan dan segera kami proses setelah Anda melakukan proses pembayaran.

Nomor pesanan Anda: #{{$order->id_psn}}INV{{date('Ymd')}}

Berikut detil pesanan Anda:

@component('mail::table')
| No | Pesanan | Jumlah | Harga |
| :--: | :------- | ------: | -----: |
@foreach ($order->detailPesanan as $key => $item)
| {{$key+1}} | {{ ucwords($item->menu->nama_menu) }} | {{ intval($item->jumlah) }} (@ {{ $item->menu->harga }}) | Rp. {{ number_format($item->tota_hrg, 0, ',', '.') }} |
@endforeach
@endcomponent
Total yang harus dibayar: <b>`Rp. {{ number_format($order->total_psn, 0, ',', '.') }}`</b>

@component('mail::panel')
Silahkan melakukan pembayaran ke nomor rekening di bawah ini:
No. Rek : {{ env('NO_REK', '123213441') }}
A/N : {{ env('NO_REK_AN', 'Iqbal Tami') }}

Silahkan lakukan konfirmasi jika sudah melakukan pembayaran.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
