<div class="container-fluid py-4">
      <div class="row">

      <h4>Selamat Datang, Pak Faril</h4><br>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Semua aset</p>
                    <h5 class="font-weight-bolder mb-0">
                      230
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">aset Rusak Hari ini</p>
                    <h5 class="font-weight-bolder mb-0">
                      8
                      <span class="text-success text-sm font-weight-bolder"></span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Pengeluaran BBM</p>
                    <h5 class="font-weight-bolder mb-0">
                      4.300.000
                      <span class="text-danger text-sm font-weight-bolder">400 Liter</span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Pengguna</p>
                    <h5 class="font-weight-bolder mb-0">
                      12
                      <span class="text-success text-sm font-weight-bolder">+1</span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      
      <div class="row my-4">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6>Laporan Kondisi aset hari ini</h6>
                  <p class="text-sm mb-0">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                    <span class="font-weight-bold ms-1">Rabu, </span>11  Juni 2024
                  </p>
                </div>
                <div class="col-lg-6 col-5 my-auto text-end">
                  <div class="dropdown float-lg-end pe-4">
                    <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-ellipsis-v text-secondary"></i>
                    </a>
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
              <?php
              $data_aset = [
                ['nama_aset' => 'aset 1', 'kode_aset' => 'K001', 'kondisi_aset' => 'Baik', 'dipakai_oleh' => 'Admin'],
                ['nama_aset' => 'aset 2', 'kode_aset' => 'K002', 'kondisi_aset' => 'Rusak', 'dipakai_oleh' => 'Pengguna'],
                ['nama_aset' => 'aset 3', 'kode_aset' => 'K003', 'kondisi_aset' => 'Rusak Ringan', 'dipakai_oleh' => 'Pengguna2'],
                ['nama_aset' => 'aset 4', 'kode_aset' => 'K004', 'kondisi_aset' => 'Baik', 'dipakai_oleh' => 'Admin'],
                ['nama_aset' => 'aset 5', 'kode_aset' => 'K005', 'kondisi_aset' => 'Rusak', 'dipakai_oleh' => 'Pengguna'],
                ['nama_aset' => 'aset 6', 'kode_aset' => 'K006', 'kondisi_aset' => 'Rusak Ringan', 'dipakai_oleh' => 'Pengguna2'],
                ['nama_aset' => 'aset 7', 'kode_aset' => 'K007', 'kondisi_aset' => 'Baik', 'dipakai_oleh' => 'Admin'],
                ['nama_aset' => 'aset 8', 'kode_aset' => 'K008', 'kondisi_aset' => 'Rusak', 'dipakai_oleh' => 'Pengguna']
              ];
              ?>
                <table class="table align-items-center mb-0">
                  <thead role="row">
                    <tr>
                      <th class="text-center text-uppercase text-secondary font-weight-bolder">Nama aset</th>
                      <th class="text-center text-uppercase text-secondary font-weight-bolder">Kode aset</th>
                      <th class="text-center text-uppercase text-secondary font-weight-bolder">Kondisi aset</th>
                      <th class="text-center text-uppercase text-secondary font-weight-bolder">Dipakai Oleh</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data_aset as $aset)
                      <tr role="row">
                        <td class="text-center">{{ $aset['nama_aset'] }}</td>
                        <td class="text-center">{{ $aset['kode_aset'] }}</td>
                        <td class="text-center">{{ $aset['kondisi_aset'] }}</td>
                        <td class="text-center">{{ $aset['dipakai_oleh'] }}</td>
                      </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card h-100">
            <div class="card-header pb-0">
              <h6>Penggunaan Kendaraan Hari ini</h6>
             
            </div>
            <div class="card-body p-3">
              <div class="timeline timeline-one-side">
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="ni ni-bell-55 text-success text-gradient"></i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">dipakai Pulang ke Kantor XYZ</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">10:20 PM</p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="ni ni-html5 text-danger text-gradient"></i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">dipakai ke Kantor A</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">07:30 PM</p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="ni ni-cart text-info text-gradient"></i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Pengisian Bensin</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">04:20 PM</p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="ni ni-credit-card text-warning text-gradient"></i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Dipakai ke Kantor B </h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">02:00 PM</p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="ni ni-key-25 text-primary text-gradient"></i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Dipakai ke Kantor B </h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">10:20 AM</p>
                  </div>
                </div>
                <div class="timeline-block">
                  <span class="timeline-step">
                    <i class="ni ni-money-coins text-dark text-gradient"></i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Dipakai ke Kantor A</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">07:30 AM</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https:/www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                for a better web.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https:/www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https:/www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https:/www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https:/www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>