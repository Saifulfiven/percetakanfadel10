
<form action="{{ route('cart.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $produk->id }}">
                                <input type="hidden" name="kodeproduk" value="{{ $produk->kodeproduk }}">
                                <input type="hidden" name="namaproduk" value="{{ $produk->namaproduk }}">
                                <input type="hidden" name="hargaproduk" value="{{ $produk->hargaproduk }}">
                                <input type="hidden" name="kategori" value="{{ $kategori->id }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label for="kode-desain">Kode Desain undangan</label>
                                            <input type="text" class="form-control" id="kode-desain" name="kode-desain" placeholder="Masukkan Kode Desain">
                                        </div>
                                       
                                        <div class="form-group mb-3">
                                            <label for="custom-nama-mempelai"><b>Isian Data Undangan : </b></label><br>
                                            <label for="custom-nama-mempelai">Nama Lengkap Mempelai</label><br>
                                            <label for="custom-nama-mempelai">Nama Panggilan Mempelai</label><br>
                                            <label for="custom-nama-mempelai">Nama Orang Tua Mempelai Laki-laki</label><br>
                                            <label for="custom-nama-mempelai">Nama Orang Tua Mempelai Perempuan</label><br>
                                            <label for="keterangan">Waktu & Tempat Resepsi</label><br>
                                            <label for="keterangan">Waktu & Tempat Akad Nikah</label><br>
                                            <label for="keterangan">Turut Mengundang</label>
                                        </div>
                                        
                                        <div class="form-group mb-3">
                                            <textarea class="form-control" id="detailcustomer" name="detailcustomer" rows="6" placeholder="Tuliskan Lengkap Data Pernikahan yang ingin dimasukkan"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                   
                                    <div class="col-auto">
                                    <div class="form-group mb-3">
                                    <label for="keterangan">Jumlah Pesanan</label>
                                            <input type="number" class="form-control" id="jumlahpesanan" name="jumlahpesanan" placeholder="500 Lembar Minimal Pemesanan" min="500" required>
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
                                </div>
                                <div class="row pb-3">
                                    <div class="col d-grid">
                                        <button type="submit" class="btn btn-success btn-lg">Tambah Ke Keranjang Belanja</button>
                                    </div>
                                </div>
                            </form>