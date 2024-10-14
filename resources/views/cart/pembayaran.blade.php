@extends('landingpage.layout')

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

              <div class="col-md-6" style="display:none">
                  <div class="row">
                  <div class="col-md-6">
                    <img src="{{ asset('images/Rekening_BRI.jpg') }}" class="img-fluid" style="border-radius:10px" alt="">
                  </div>

                  <div class="col-md-6  mt-1">
                    <img src="{{ asset('images/Rekening_BCA.jpg') }}" class="img-fluid"  style="border-radius:10px" alt="">
                  </div>
                </div>
                
              </div>

              <div class="col-md-12 mt-3">
                <div class="row">
                  <div class="col-sm-6" style="background: linear-gradient(90deg, #007bff 0%, #0069d9 100%); color: white; padding:10px">
                    Lakukan Pembayaran Sesuai Total Yang Tertera : <span style="color: white;font-size: 30px">Rp. {{ number_format($total_bayar, 0, ',', '.') }}</span>
                  </div>

                  <div class="col-sm-4">
                    <button type="button" class="btn btn-primary btn-block btn-lg mt-3" style="background: linear-gradient(90deg, #007bff 0%, #0069d9 100%);padding:15px" id="pay-button"><i class="fas fa-money-bill-wave"></i> Bayar Sekarang</button>
                  </div>
                </div>
              </div>
                
                  <!-- <form action="{{ route('pembayaran', $kodeorder) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                       -->
      

                      <!-- <div class="form-group">
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
                    </div> -->

                    <!-- </div>

                  </form> -->
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

@section('scripts')
  <script src="https://app.midtrans.com/snap/snap.js" data-client-key="env('MIDTRANS_CLIENT_KEY')"></script>
  <script type="text/javascript">
      document.getElementById('pay-button').onclick = function(){
        // SnapToken acquired from previous step
        snap.pay('<?=$snap_token?>', {
          // Optional
          onSuccess: function(result){
          window.location.href = "/sukses/{{ $kodeorder }}";
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          // Optional
          onPending: function(result){

          window.location.href = "/pending/{{ $kodeorder }}";
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          // Optional
          onError: function(result){

          window.location.href = "/gagal/{{ $kodeorder }}";
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          }
        });
      };
    </script>
@endsection