@extends('landingpage.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <br><br>
        <img src="{{ url('images/gagal.png') }}" width="200" alt="" class="mx-auto d-block">
        
        <div class="text-center py-5">
            
            <h2><i class="fa fa-check-circle-o" aria-hidden="true"></i> Mohon Maaf !!!</h2>
            <p>Pembayaran Anda telah Gagal diproses. Kami akan segera menghubungi Anda untuk konfirmasi lebih lanjut.</p>
        </div>
    </div>
</div>

@endsection
