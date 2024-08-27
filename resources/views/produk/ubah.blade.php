@extends('admindashboard.layout')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
            <div class="card-header d-flex justify-content-between bg-primary text-white">
                    <strong>Ubah Produk</strong>
                    <a href="/admin/produk" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>

                <div class="card-body">

                        <form action="/admin/produk/ubah/{{ $produk->id }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="namaproduk" class="col-sm-3 col-form-label">Nama Produk</label>
                                <input type="text" class="form-control" name="namaproduk" id="namaproduk" value="{{ $produk->namaproduk }}" required>
                            </div>
                            <div class="form-group row">
                                <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="hargaproduk" id="hargaproduk" value="{{ $produk->hargaproduk }}" required>
                                </div>
                                <div class="col-sm-2">
                                    <select class="form-select" name="satuan" id="satuan" required>
                                        <option value="">Pilih Satuan</option>
                                        <option {{ $produk->satuan == 'centimeter' ? 'selected' : '' }} value="centimeter">Centimeter</option>
                                        <option {{ $produk->satuan == 'meter' ? 'selected' : '' }} value="meter">Meter</option>
                                        <option {{ $produk->satuan == 'box' ? 'selected' : '' }} value="box">Box</option>
                                        <option {{ $produk->satuan == 'rim' ? 'selected' : '' }} value="rim">Rim</option>
                                        <option {{ $produk->satuan == 'lembar' ? 'selected' : '' }} value="lembar">Lembar</option>
                                        <option {{ $produk->satuan == 'pcs' ? 'selected' : '' }} value="pcs">Pcs</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="5" required>{{ $produk->deskripsi }}</textarea>
                            </div>

                            
                            <div class="form-group">
                                <label for="kategoriproduk" class="col-sm-6 col-form-label">Kategori Produk</label>
                                <select class="form-control" name="kategoriproduk" id="kategoriproduk">
                                    <option value="">Pilih Kategori</option>
                                    @foreach($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}" {{ $produk->kategoriproduk == $kategori->id ? 'selected' : ''}}>{{ $kategori->namakategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            

                            <div class="form-group">
                                <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                                <div class="row mb-2 mt-2">
                                    @foreach($fotoproduk as $foto)
                                        <div class="col-md-3">
                                            <input type="hidden" name="fotoproduk_id[]" value="{{ $foto->id }}">
                                            <img src="{{ asset('images/produk/'.$foto->fotoproduk) }}" class="img-thumbnail" style="width: 100%; height: auto;">

                                        <input type="file" class="form-control" name="gambar[{{ $loop->iteration }}]" id="gambar">
                                        <input type="hidden" name="fotoproduk_lama[]" value="{{ $foto->fotoproduk }}">
                                        </div>
                                    
                                @endforeach
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="statusaktif">Status Aktif</label>
                                <select class="form-control" name="statusaktif" id="statusaktif">
                                    <option value="Aktif" {{ $produk->statusaktif == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="Tidak Aktif" {{ $produk->statusaktif == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection


