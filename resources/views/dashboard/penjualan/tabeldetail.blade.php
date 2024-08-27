@extends('admindashboard.layout')

@section('content')
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            @if (session('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            @if (session('error'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            <div class="card-header pb-0 position-relative mb-5 ">
              <h6>Data Detail Order Penjualan</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2 p-3">
              
              <div class="row p-3">
                <div class="col-md-6">
                  <h4>Data Order Status Pembayaran</h4>
                  <ul class="list-group">
                    <li class="list-group-item">Kode Order : {{ $pembayaran->kodeorder }}</li>
                    <li class="list-group-item">Total Bayar : {{ $pembayaran->totalbayar }}</li>
                    <li class="list-group-item">Status Bayar : {{ $pembayaran->status }}</li>
                    
                  </ul>
                </div>
              
              <div class="col-md-6">
              <h4>Bukti & Update Status Pengerjaan</h4>
              <form action="/admin/penjualan/updatestatus/{{ $pembayaran->id }}" method="POST">
                @csrf
                
                      <img src="{{ asset('/assets/pembayaran/' . $pembayaran->gambarbukti) }}" 
                      alt="{{ $pembayaran->gambarbukti }}" height="200px">

                <div class="form-group">
                  <label for="status">Status Pengerjaan</label>
                  <select class="form-control" name="statuspengerjaan" id="status">
                    <option value="Belum Dikerjakan" {{ $pembayaran->status == 'Belum Dikerjakan' ? 'selected' : '' }}>Belum Dikerjakan</option>
                    <option value="Sedang Dikerjakan" {{ $pembayaran->status == 'Sedang Dikerjakan' ? 'selected' : '' }}>Sedang Dikerjakan</option>
                    <option value="Selesai" {{ $pembayaran->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
              </form>
            </div>

            <div style="margin-top:20px;width:100%;height:5px;background-image:linear-gradient(to right, red, orange, yellow, green, blue, indigo, violet);background-size:200% 100%;animation: gradient 6s ease infinite;"></div>
              <style>
                @keyframes gradient {
                  0%{background-position:0% 50%}
                  50%{background-position:100% 50%}
                  100%{background-position:0% 50%}
                }
              </style>
            </div>


              <div class="row">
              
              
              
                @foreach ($detail_order as $item)
                  <div class="col-12 col-md-6 col-lg-4 mb-5">
                    <div class="card h-100">
                      <img src="{{ asset('storage/produk/' . $item->fotoproduk) }}" class="card-img-top" alt="{{ $item->nama_produk }}">
                      <div class="card-body">
                        <h5 class="card-title">{{ $item->namaproduk }}</h5>
                        @if($item->uploadfile)
                            <a href="{{ asset('assets/uploadfile/' . $item->uploadfile) }}" class="btn btn-primary" download><i class="fa fa-download"></i> Download File</a>
                        @endif
                        <p class="card-text">
                        @if(!empty($item->stikerpanjang) && !empty($item->stikerlebar))
                          <span class="fw-bold">Ukuran:</span> {{ $item->stikerpanjang }} x {{ $item->stikerlebar }} cm<br>
                        @endif
                        <span class="fw-bold">Bahan:</span> {{ $item->stikerbahan }}<br>
                        <br>
                          <span class="fw-bold">Keterangan:</span> {{ $item->keterangan }} <br>
                          <span class="fw-bold">Jumlah:</span> {{ $item->jumlahpesanan }}<br>
                          <span class="fw-bold">Harga:</span> Rp {{ number_format($item->hargaproduk, 0, ',', '.') }}<br>
                          <span class="fw-bold">Total:</span> Rp {{ number_format($item->jumlahpesanan * $item->hargaproduk, 0, ',', '.') }}
                        </p>
                        
                      </div>
                      
                      <form action="/admin/penjualan/updatestatuspengerjaan/{{ $item->id }}" method="post" class="p-2">
                        @csrf
                        <div class="row">
                        <span><b>Status Pengerjaan</b></span>
                        <div class="col-md-6">
                          <div class="form-group">
                            
                            <select class="form-control" name="statuspengerjaan" id="statusPengerjaan">
                              <option value="Sedang Proses" {{ $item->statuspengerjaan == 'Sedang Proses' ? 'selected' : '' }}>Sedang Proses</option>
                              <option value="Selesai" {{ $item->statuspengerjaan == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <button type="submit" class="btn btn-primary">Update</button>
                        </div>
</div>
                      </form>
                    </div>
                  </div>
                @endforeach
                  
              </div>
            </div>

          </div>
        </div>
      </div>

      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                for a better web.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<!--   Core JS Files   -->
    <script src="{{ asset('assetsadmin/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assetsadmin/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assetsadmin/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assetsadmin/js/plugins/smooth-scrollbar.min.js') }}"></script>


@endsection

