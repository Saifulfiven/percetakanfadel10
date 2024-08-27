<ul class="list-inline">
    <li class="list-inline-item">
        <h6>Minimal Pemesanan :</h6>
    </li>
    <li class="list-inline-item">
        <p class="text-muted"><strong>100 Lembar </strong></p>
    </li>
</ul>
<form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $produk->id }}">
    <input type="hidden" name="kodeproduk" value="{{ $produk->kodeproduk }}">
    <input type="hidden" name="namaproduk" value="{{ $produk->namaproduk }}">
    <input type="hidden" name="hargaproduk" value="{{ $produk->hargaproduk }}">
    <input type="hidden" name="kategori" value="{{ $kategori->id }}">
    <div class="row">
        <div class="col-md-12">
        <div class="row">
            <div class="col-md-12" style="display:none">
                <label for="kode-desain">Kode Desain</label>
                <select class="form-select form-control" id="kode-desain" name="kode-desain">
                    <option value="1">Desain 1</option>
                    <option value="2">Desain 2</option>
                    <option value="3">Desain 3</option>
                    <option value="4">Desain 4</option>
                    <option value="5">Desain 5</option>
                    <option value="6">Desain 6</option>
                    <option value="7">Desain 7</option>
                </select>
            </div>
         
        </div>

        <div class="form-group mt-3">
            <label for="jenis_bahan">Jenis Kertas</label>
            <select class="form-select form-control" id="jenis_bahan" name="jenis_bahan">
                <option value="Kinstruk 230gr" selected>Kinstruk 230gr</option>
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="finishing">Finishing Sudut</label>
            <select class="form-select form-control" id="finishing" name="finishing">
                <option value="Persegi / Sudut Lancip">Persegi / Sudut Lancip</option>
                <option value="Rounded / Melengkung">Rounded / Melengkung</option>
            </select>
        </div>
        <br>

            
            <div class="form-group mb-3">
                <label>Cantumkan Nama, Brand, No Telp, Email, Website, dan Alamat</label>
                <textarea class="form-control" id="detailcustomer" name="detailcustomer" rows="6" placeholder="Cantumkan Nama, Brand, No Telp, Email, Website, dan Alamat"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        
        <div class="col-auto">
        <div class="form-group mb-3">
        <label for="keterangan">Jumlah Pesanan</label>
                <input type="number" class="form-control" id="jumlahpesanan" name="jumlahpesanan" required> Dalam Hitungan <b>{{ $produk->satuan }} *</b>
            </div>
            <ul class="list-inline pb-3" style="display:none">
                <li class="list-inline-item text-right">
                    Quantity
                    <input type="hidden" name="product-quanity" id="product-quanity" value="1">
                </li>
                <li class="list-inline-item"><span class="btn btn-success" id="btn-minus">-</span></li>
                <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                <li class="list-inline-item"><span class="btn btn-success" id="btn-plus">+</span></li>
            </ul>
        </div>

        <div class="form-group mb-3">
            <div class="col-md-6">
                <label for="fileupload">Upload File (Boleh dikosongkan)</label>
                <input type="file" class="form-control-file" id="fileupload" name="fileupload">
            </div>

        <div>
            <small>Catatan: File tidak wajib diisi.</small>
        </div>
        <div>
    </div>
    <div class="row pb-3 mt-3">
        <div class="col d-grid">
            <button type="submit" class="btn btn-success btn-lg">Tambah Ke Keranjang Belanja</button>
        </div>
    </div>
</form>