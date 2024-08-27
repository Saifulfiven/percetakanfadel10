<!-- Start Article -->
            <hr style="height:7px;border:none;color:#333;background-color:#e0dede;">
<section class="py-5">
        <div class="container">
            
          @foreach ($kategori as $kategoris)
            <div class="row text-left p-2 pb-3">
                <h4>{{ $kategoris->namakategori }}</h4>

                @foreach ($produk as $produks)
                    @if ($produks->kategoriproduk == $kategoris->id)
                        <div class="col-md-3">
                            <div class="p-2 pb-3">
                                <div class="product-wap card rounded-0">
                                    <div class="card rounded-0">
                                        <img class="card-img rounded-0 img-fluid" src="{{ asset('images/produk/'. $produks->gambar) }}">
                                        <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                            <ul class="list-unstyled">
                                                <li><a class="btn btn-success text-white" href="/detailproduk"><i class="far fa-heart"></i></a></li>
                                                <li><a class="btn btn-success text-white mt-2" href="/detailproduk"><i class="far fa-eye"></i></a></li>
                                                <li><a class="btn btn-success text-white mt-2" href="/detailproduk"><i class="fas fa-cart-plus"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <a href="/detailproduk" class="h3 text-decoration-none">{{ $produks->namaproduk }}</a>
                                        <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                            
                                            <li class="pt-2">
                                                <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                                <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                                <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                                <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                                <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                            </li>
                                        </ul>
                                        <p class="mb-0">Rp<?php echo number_format($produks->hargaproduk, 0, ',', '.'); ?></p>
                                        <a href="/detailproduk/{{ $produks->slug }}" class="text-black w-100 mt-2">Pesan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                
                    <hr class="border-success mt-4" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);">

            </div> <!-- row -->
          @endforeach




        </div>
    </section>
    <!-- End Article -->