@extends('landingpage.layout')

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
                               <td>Rp. {{ $item->totalbayar }}</td>
                               <td>{{ $item->created_at }}</td>
                               <td>
                                @if($item->status == 'Lunas')
                                <button class="btn btn-success">Lunas</button>
                                @elseif($item->status == 'Pending')
                                <button class="btn btn-warning">Pending</button>
                                @elseif($item->status == 'Belum Lunas')
                                <button class="btn btn-warning">Belum Lunas</button>
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
