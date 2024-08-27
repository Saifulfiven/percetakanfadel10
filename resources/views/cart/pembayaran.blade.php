@extends('Landingpage.layout')

@section('content')

<section class="py-5">
        <div class="container">
            <div class="row">
                

                <div class="col-md-12">
                  <div class="d-flex justify-content-between align-items-center">
                      <h3>Pembayaran</h3>
                      <a href="/riwayatorder" class="btn btn-primary">Kembali</a>
                  </div>
                
                </div>
            </div>
              
            
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            
            <div class="card-body px-3 pt-3 pb-2">
              
              <div class="row">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Nama Produk</th>
                      <th>Jumlah</th>
                      <th>Harga</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($detail_order as $item)
                      <tr>
                        <td> {{ $item->namaproduk }}</td>
                        <td>{{ $item->jumlahpesanan }}</td>
                        <td>Rp {{ number_format($item->hargaproduk, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($item->jumlahpesanan * $item->hargaproduk, 0, ',', '.') }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>

                <div class="col-sm-12">
                    <h6>Total Bayar Rp {{ number_format($total_bayar, 0, ',', '.') }}</h6>
                </div>
                  
              </div>

              
              
                
              <div class="row mt-3">

              <div class="col-md-6">
                  <div class="row">
                  <div class="col-md-6">
                    <img src="{{ asset('images/bri.jpeg') }}" class="img-fluid" alt="">
                  </div>

                  <div class="col-md-6  mt-1">
                    <img src="{{ asset('images/bsi.jpg') }}" class="img-fluid" alt="" width="95%">
                  </div>
                </div>
                
              </div>

              <div class="col-md-6 mt-3">
                
                  <form action="{{ route('pembayaran', $kodeorder) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                      
                      <div class="col-sm-12" style="background-color: #28a745; color: white; padding:10px">
                        Lakukan Pembayaran Sesuai Total Yang Tertera : <h3 style="color: white;">Rp. {{ number_format($total_bayar, 0, ',', '.') }}</h3>
                      </div>
                      <br>


                      <div class="form-group">
                        <div class="col-sm-12">
                          <label for="namarekening">Nama Pemilik Rekening</label>
                        </div>

                        <div class="col-sm-12">
                          <input type="text" class="form-control" id="namarekening" name="namarekening" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-sm-12">
                          <label for="nominal_transfer">Nominal Transfer (Tuliskan jika tidak sesuai dengan total)</label>
                        </div>

                        <div class="col-sm-12">
                          <input type="number" class="form-control" id="nominaltransfer" name="nominaltransfer">
                        </div>
                      </div>
                 
                      <div class="col-sm-12">
                        <label for="bukti_transfer">Upload Bukti Transfer</label>
                      </div>

                      <div class="col-sm-12">
                        <input type="file" class="form-control-file" id="bukti_transfer" name="gambarbukti" onchange="previewImage()" style="margin-bottom: 10px;" required>
                      </div>
                      <br>

                      <div class="col-sm-12">
                        <img id="preview" src="" style="display: none; width: 100%; border-radius: 10px; margin-top: 10px;">
                      </div>
                      
                      <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>

                    </div>

                  </form>
                    </div>
                
              </div>

              <script>
                function previewImage() {
                  const image = document.querySelector('#bukti_transfer');
                  const preview = document.querySelector('#preview');

                  const oFReader = new FileReader();
                  oFReader.readAsDataURL(image.files[0]);

                  oFReader.onload = function(oFREvent) {
                    preview.src = oFREvent.target.result;
                    preview.style.display = 'block';
                  }
                }
              </script>
              
              

              
            </div>
               
              
    </div>
</section>

@endsection
