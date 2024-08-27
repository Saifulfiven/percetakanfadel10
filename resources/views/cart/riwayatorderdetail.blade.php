@extends('Landingpage.layout')

@section('content')

<section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="card-header pb-0 position-relative mb-5">
              
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h6>Data Detail Order Penjualan</h6>
                  <a href="/riwayatorder" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              
              <div class="row">
                @foreach ($detail_order as $item)
                  <div class="col-12 col-md-6 col-lg-4 mb-5">
                    <div class="card h-100">
                      <img src="{{ asset('storage/produk/' . $item->fotoproduk) }}" class="card-img-top" alt="{{ $item->nama_produk }}">
                      <div class="card-body">
                        <h5 class="card-title">{{ $item->namaproduk }}</h5>
                        <p class="card-text">

                        @if(!empty($item->stikerpanjang) && !empty($item->stikerlebar))
                            <span class="fw-bold">Ukuran:</span> {{ $item->stikerpanjang }} x {{ $item->stikerlebar }} cm<br>
                        @endif


                        @if(!empty($item->stikerbahan))
                        <span class="fw-bold">Bahan:</span> {{ $item->stikerbahan }}<br>
                        @endif
                        <br>
                          <span class="fw-bold">Keterangan:</span> {{ $item->keterangan }} <br>
                          <span class="fw-bold">Jumlah:</span> {{ $item->jumlahpesanan }}<br>
                          <span class="fw-bold">Harga:</span> Rp {{ number_format($item->hargaproduk, 0, ',', '.') }}<br>
                          <span class="fw-bold">Total:</span> Rp {{ number_format($item->jumlahpesanan * $item->hargaproduk, 0, ',', '.') }}
                        </p>

                          <br>
                          @if($item->statuspengerjaan == "Sedang Proses")
                          <span class="fw-bold">Status Pengerjaan:</span> <span class="badge bg-warning">{{ $item->statuspengerjaan }}</span> <br>
                          @elseif($item->statuspengerjaan == "Selesai")
                          <span class="fw-bold">Status Pengerjaan:</span> <span class="badge bg-success">{{ $item->statuspengerjaan }}</span> <br>
                          @endif
                      </div>
                    </div>
                  </div>
                @endforeach
                  
              </div>
            </div>
               
                
            </div>
        </div>
    </div>
</section>

@endsection
