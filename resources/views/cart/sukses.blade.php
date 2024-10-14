@extends('landingpage.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <br><br>
        <img src="{{ url('images/centang.png') }}" width="200" alt="" class="mx-auto d-block">
        
        <div class="text-center py-5">
            
            <h2><i class="fa fa-check-circle-o" aria-hidden="true"></i> Terima Kasih</h2>
            <p>Pembayaran Anda telah berhasil diproses. Kami akan segera menghubungi Anda untuk konfirmasi lebih lanjut.</p>
        </div>
    </div>
</div>

@endsection
