 <!-- Start Categories of The Month -->
 <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Favorit Produk</h1>
                <p>
                </p>
            </div>
        </div>
        <div class="row">
            @foreach ($produkfavorit as $product)
            <div class="col-12 col-md-2">
                <a href="/detailproduk/{{ $product->slug }}"><img src="{{ asset('images/produk/' . $product->gambar) }}" class="img-fluid border"></a>
                <br><br>
                <p class="text-center"><a class="btn btn-success" href="/detailproduk/{{ $product->slug }}">Pesan</a></p>
            
                <h5 class="text-center mt-3 mb-3">{{ $product->namaproduk }}</h5>
               </div>
            @endforeach
            
        </div>
    </section>
    <!-- End Categories of The Month -->


    