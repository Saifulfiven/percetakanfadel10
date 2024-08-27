@extends('Landingpage.layout')

@section('content')

<!-- Start Article -->
<section class="py-5">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8 text-center">
              <a href="https://wa.me/6281222333333" class="btn btn-success btn-lg" target="_blank">
                <i class="fa fa-whatsapp"></i>
                Hubungi Kami di Whatsapp
              </a>
            </div>
          </div>
          <br>
          <hr class="my-4">
Atau Kirim Pesan Melalui Form Di Bawah Ini 
<br><br>
          <form action="/hubungi-kami" method="post" class="p-4 rounded" style="background: #f8f9fa;">
            @csrf
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control {{ $errors->has('nama') ? ' is-invalid' : '' }}" id="nama" name="nama" placeholder="Masukkan nama anda" value="{{ old('nama') }}">
              @if ($errors->has('nama'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('nama') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="email">Email ( Tidak Wajib )</label>
              <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" placeholder="Masukkan email anda" value="{{ old('email') }}">
              @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="pesan">Pesan</label>
              <textarea class="form-control {{ $errors->has('pesan') ? ' is-invalid' : '' }}" id="pesan" name="pesan" placeholder="Masukkan pesan anda" rows="3">{{ old('pesan') }}</textarea>
              @if ($errors->has('pesan'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('pesan') }}</strong>
                </span>
              @endif
            </div><br>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
          </form>

        </div>
    </section>
    <!-- End Article -->
    @endsection
