@extends('Landingpage.layout')

@section('content')

<section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    
                        <div class="alert mt-3 text-center" role="alert">
                            <h4 class="alert-heading">Success!</h4>
                            <p>Pemesanan anda Segera diproses</p>
                            <p class="mb-0 center">
                                <a href="/riwayatorder" class="btn btn-primary">Lihat Riwayat Order</a>
                            </p>
                            
<br> 
                            <p class="mb-0 center">
                                <img src="{{ asset('/images/sukses.jpg') }}"
                                alt="Success" style="width: 50%;">
                            </p>
                        </div>
                    
                
                </div>
        </div>
    </div>
</section>

@endsection
