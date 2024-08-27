<ul class="list-inline">
    <li class="list-inline-item">
        <h6>Minimal Pemesanan :</h6>
    </li>
    <li class="list-inline-item">
        <p class="text-muted"><strong>501 Lembar </strong></p>
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
       


        <div class="form-group mt-3">
            <label for="finishing">Finishing Lipat Jika dilipat proses pengerjaan +1Hari]</label>
            <select class="form-select form-control" id="finishing" name="finishing">
                <option value="Tanpa Lipat">Tanpa Lipat</option>
                <option value="Brosur Lipat 2">Brosur Lipat 2</option>
                <option value="Brosur Lipat 3">Brosur Lipat 3</option>
                <option value="Brosur Lipat 4">Brosur Lipat 4</option>
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