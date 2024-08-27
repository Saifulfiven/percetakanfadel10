<style>
      
        .content {
            border: 1px dotted #ccc;
            padding:5px;
            
        }
        .pagination {
            display: inline-block;
        }
        .pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
            border: 1px solid #ddd;
            margin: 0 4px;
        }
        .pagination a.active {
            background-color: #4CAF50;
            color: white;
            border: 1px solid #4CAF50;
        }
        .pagination a:hover:not(.active) {background-color: #ddd;}

        .bg-pengalaman {
    background-image: url("/img/bg-pengalaman.jpg");
    background-repeat: no-repeat;
  background-size: cover;
}
    </style>
<!-- Blog Start -->
        <div class="container-fluid py-5 bg-pengalaman">
            <div class="container py-5">
                <div class="text-center mb-5 wow fadeInUp" data-wow-delay=".3s">
                    <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary">Cerita Alumni</h5>
                    <h1 class="display-5">{{ $judulpengalaman }}</h1>
                </div>

                <span style="font-family: Arial, sans-serif; font-size: 22px;" class="mb-5"> Baca cerita hidup mereka dan ketahui apa yang mendorong mereka</span>
                
                <div class="container">
    
    <?php
    // Konfigurasi pagination
    $perPage = 1; // Jumlah konten per halaman
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Halaman saat ini
    $start = ($page - 1) * $perPage; // Item pertama yang akan ditampilkan
    
    // Contoh data (bisa diganti dengan data dari database)
    $data = array(
        array("title" => "Konten 1", "content" => "Isi Konten 1"),
        array("title" => "Konten 2", "content" => "Isi Konten 2"),
        array("title" => "Konten 3", "content" => "Isi Konten 3"),
        array("title" => "Konten 4", "content" => "Isi Konten 4"),
        array("title" => "Konten 5", "content" => "Isi Konten 5")
    );
    ?>   
   
  
                <div class="content rounded">
                    <div class="row align-items-center">
                   
                        <div class="col-lg-6 wow fadeIn" data-wow-delay=".5s">
                            <img src="images/pengalaman/{{ $Pengalaman[$start]['foto'] }}" class="img-fluid rounded" alt="Acara">
                        </div>
                        
                        <div class="col-lg-6 wow fadeIn" data-wow-delay=".5s">
                            <h2 class="mb-4" style="color: blue;"><?php echo $Pengalaman[$start]["judul"] ?></h2>
                            <p><i>
                            <?php $Pengalaman[$start]["detail"] ?>
                            </i></p>
                            <h1 class="mb-4" style="color: #ee2122;">{{ $Pengalaman[$start]["nama"] }}</h1>
                            <span> {{$Pengalaman[$start]["pekerjaan"]}} </span><br>

                            <span><b>{{ $Pengalaman[$start]["jurusan"]}} {{ $Pengalaman[$start]["angkatan"]}} </b></span>
                            
                            @if($ceritalain)
                            <br><a href="/pengalaman" class="btn btn-primary mt-3" style="letter-spacing: 5px;color:white">TEMUKAN CERITA LAINNYA</a>
                            @endif
                            <?php
                            
                            if($navhalaman){
                            // Pagination links
                            echo '<br><div class="pagination">';
                            if ($page > 1) {
                                echo '<a href="?page=' . ($page - 1) . '">Previous</a>';
                            }
                            if ($start + $perPage < count($Pengalaman)) {
                                echo '<a href="?page=' . ($page + 1) . '">Next</a>';
                            }
                            echo '</div>';
                            }
                            ?>
                    
                        </div>
                    
                    </div>
                </div>

                   

            </div>
        </div>
                        </div>
        <!-- Blog End -->
       