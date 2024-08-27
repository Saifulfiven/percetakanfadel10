
    <!-- Start Footer -->
    <footer id="tempaltemo_footer">
        <hr>
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 pb-3 logo" style="background: linear-gradient(to right, #00b0ff, #0000ff); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Fadel Printing</h2>
                    <ul class="list-unstyled footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            JL AP Pettarani, Komplek Bisnis Centre III, 
                            Blk. B No.5, Masale, Kec. Panakkukang,
                             Kota Makassar, Sulawesi Selatan 90231
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:010-020-0340">082291938794</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:info@company.com">admin@faderprinting.com</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 pb-3">Kategori Produk</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">Stiker</a></li>
                        <li><a class="text-decoration-none" href="#">Brosur</a></li>
                        <li><a class="text-decoration-none" href="#">Poster</a></li>
                        <li><a class="text-decoration-none" href="#">Merchandise</a></li>
                        <li><a class="text-decoration-none" href="#">Kartu Nama</a></li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 pb-3">Link</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="/">Home</a></li>
                        <li><a class="text-decoration-none" href="#">Kenali Kami</a></li>
                        <li><a class="text-decoration-none" href="#">Google Maps</a></li>
                        <li><a class="text-decoration-none" href="/hubungi-kami">Hubungi Kami</a></li>
                        <li><a class="text-decoration-none" href="/login">login</a></li>
                    </ul>
                </div>

            </div>

            <div class="row text-light mb-4">
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-auto">
                    <label class="sr-only" for="subscribeEmail">Email address</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control border-light" id="subscribeEmail" placeholder="Email address">
                        <div class="input-group-text btn-primary text-light">Subscribe</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-100 py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left">
                            Copyright &copy; 2024 Fadel Printing
                            | Designed by <a rel="sponsored" href="https://storynikah.com" target="_blank">Fiventech</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="{{ asset('assets/js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/templatemo.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <!-- Start Slider Script -->
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script>
        $('#carousel-related-product').slick({
            infinite: true,
            arrows: false,
            slidesToShow: 4,
            slidesToScroll: 3,
            dots: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                }
            ]
        });
    </script>
    <!-- End Script -->
</body>

</html>