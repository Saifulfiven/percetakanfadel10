<!-- Open Content -->
<section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src="{{ asset('images/produk/' . $fotoprodukpertama->fotoproduk) }}" alt="Fadel Print" id="product-detail">
                    </div>
                    <div class="row">
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-dark fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </div>
                        <!--End Controls-->
                        <!--Start Carousel Wrapper-->
                        <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                            <!--Start Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">

                                <!--First slide-->
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($fotoproduk as $image)
                                    @if ($i % 3 == 0)
                                        <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                            <div class="row">
                                    @endif
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="{{ asset('/images/produk/'.$image->fotoproduk) }}" alt="Product Image {{ $i + 1 }}">
                                            </a>
                                        </div>
                                    @php
                                        $i++;
                                    @endphp
                                    @if ($i % 3 == 0)
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                @if ($i % 3 != 0)
                                        </div>
                                    </div>
                                @endif
                                <!--/.First slide-->

                                
                            </div>
                            <!--End Slides-->
                        </div>
                        <!--End Carousel Wrapper-->
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-dark fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2">{{ $produk->namaproduk }}</h1>
                            <p class="h3 py-2">Rp{{ number_format($produk->hargaproduk, 0, ',', '.') }}</p>
                            <p class="py-2">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-secondary"></i>
                            </p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Kategori : {{$produk->nama_kategori }}</h6>
                                </li>
                              
                            </ul>

                            <h6>Deskripsi:</h6>
                            <p>{{ $produk->deskripsi }}</p>
                          

                        @if($kategori->id == '10')
                            @include('shopdetail.form-undangan')
                        @elseif($kategori->id == '2')
                            @include('shopdetail.form-stikerlabel')
                        @elseif($kategori->id == '3')
                            @include('shopdetail.form-stikerlabel')
                        @elseif($kategori->id == '5')
                            @include('shopdetail.form-brosur')
                        @elseif($kategori->id == '6')
                            @include('shopdetail.form-stikerposter')
                        @elseif($kategori->id == '11')
                            @include('shopdetail.form-kartunama')
                        @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->