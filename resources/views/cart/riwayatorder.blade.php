@extends('Landingpage.layout')

@section('content')

<section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <h1>Riwayat Order</h1>
                
                <table class="table">
                    <thead>
                        <tr>
                            <th>Koder Order</th>
                            <th>Total Bayar</th>
                            <th>Waktu</th>
                            <th>Status Pembayaran</th>
                            <th>Status Pengerjaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $item)
                            <tr>
                                <td>{{ $item->kodeorder }}</td>
                               <td>Rp. {{ number_format($item->totalbayar, 0, ',', '.') }}</td>
                               <td>{{ $item->created_at }}</td>
                               <td>
                                @if($item->status == 'Lunas')
                                <button class="btn btn-success">Lunas</button>
                                @elseif($item->status == 'Belum Lunas')
                                <button class="btn btn-warning">Belum Lunas</button>
                                @elseif($item->status == 'Menunggu Konfirmasi Admin')
                                <button class="btn btn-warning">Menunggu Konfirmasi Admin</button>
                                @endif
                                </td>
                                <td>{{ $item->statuspengerjaan }}</td>
                               <td><a href="/riwayatorder/{{ $item->kodeorder }}" class="btn btn-primary">Lihat</a>
                                   <a href="/pembayaran/{{ $item->kodeorder }}" class="btn btn-primary">Bayar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
               
                
            </div>
        </div>
    </div>
</section>

@endsection
