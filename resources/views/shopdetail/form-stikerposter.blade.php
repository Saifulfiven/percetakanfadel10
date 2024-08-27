<ul class="list-inline">
    <li class="list-inline-item">
        <h6>Minimal Pemesanan :</h6>
    </li>
    <li class="list-inline-item">
        <p class="text-muted"><strong>1 Lembar </strong></p>
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
            <h6>Ukuran Poster</h6>
            <div class="col-md-6">
                <label for="panjang_cm">Panjang (cm)</label>
                <input type="text" class="form-control" id="panjang_cm" name="panjang_cm">
            </div>
            <div class="col-md-6">
                <label for="lebar_cm">Lebar (cm)</label>
                <input type="text" class="form-control" id="lebar_cm" name="lebar_cm">
            </div>
        </div>

        <div class="form-group mt-3" style="display:none">
            <label for="jenis_bahan">Jenis Bahan</label>
            <select class="form-select form-control" id="jenis_bahan" name="jenis_bahan">
                <option value="" selected>kosong</option>
                <option value="bahan1">Vinyl Glossy</option>
                <option value="bahan2">Vinyl Transparan</option>
                <option value="bahan3">Vinyl Matte</option>
            </select>
        </div>
        <br>

            
            <div class="form-group mb-3">
                <textarea class="form-control" id="detailcustomer" name="detailcustomer" rows="6" placeholder="Deskripsi atau Catatan Tambahan"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        
        <div class="col-auto">
        <div class="form-group mb-3">
        <label for="keterangan">Jumlah Pesanan</label>
                <input type="number" class="form-control" id="jumlahpesanan" name="jumlahpesanan" required>
                <span><b>Dalam Hitungan {{ $produk->satuan }}*</b></span>
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

        <div style="display:none">
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