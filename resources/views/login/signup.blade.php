<!--
=========================================================
* Soft UI Dashboard - v1.0.7
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
Login Fadel Print
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="<?php echo e(asset('assetsadmin/css/nucleo-icons.css')); ?>" rel="stylesheet" />
  <link href="<?php echo e(asset('assetsadmin/css/nucleo-svg.css')); ?>" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="<?php echo e(asset('assetsadmin/css/nucleo-svg.css')); ?>" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?php echo e(asset('assetsadmin/css/soft-ui-dashboard.css?v=1.0.7')); ?>" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0 mt-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute start-0 end-0 mx-4">
          <div class="container-fluid pe-0">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="/">
              Fadel Printing
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav mx-auto ms-xl-auto me-xl-7">
                
              <li class="nav-item">
                  <a class="nav-link me-2" href="/daftar">
                    <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                    Daftar
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="/login">
                    <i class="fas fa-key opacity-6 text-dark me-1"></i>
                    Login
                  </a>
                </li>
              </ul>
              
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">Fadel Printing</h3>
                  <p class="mb-0">Daftar / Register</p>
                    
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{session('error')}}
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @endif
                    
                </div>
                <div class="card-body">
                    
                <form action="{{route('daftar')}}" method="post">
            @csrf
                <div class="form-group">
                    <label><i class="fa fa-envelope"></i> Nama Lengkap</label>
                    <input type="text" name="namalengkap" class="form-control" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-envelope"></i> No Handphone</label>
                    <input type="text" name="no_hp" class="form-control">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-user"></i> Jenis Kelamin</label>
                    <select class="form-control" name="jeniskelamin">
                        <option value="Pria">Laki-laki</option>
                        <option value="Wanita">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label><i class="fa fa-calendar-alt"></i> Tahun Lahir</label>
                    <select class="form-control" name="tahunlahir">
                        <option value="">Pilih Tahun Lahir</option>
                        @for ($i = date('Y'); $i > 1900; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                
                
                <div class="form-group">
                    <label><i class="fa fa-user"></i> Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-key"></i> Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" pattern=".{8,}" title="Min 8 Max 8 characters" required="">
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fa fa-user"></i> Daftar
                </button>
                <hr>
                <p class="text-center">Sudah punya akun silahkan <br><a href="/login" class="btn btn-primary text-info text-gradient font-weight-bold">Login Disini!</a></p>
            </form>
                </div>
                
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('assetsadmin/img/curved-images/curved6.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  
  <!--   Core JS Files   -->
  <script src="<?php echo e(asset('assetsadmin/js/core/popper.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assetsadmin/js/core/bootstrap.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assetsadmin/js/plugins/perfect-scrollbar.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assetsadmin/js/plugins/smooth-scrollbar.min.js')); ?>"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo e(asset('assetsadmin/js/soft-ui-dashboard.min.js?v=1.0.7')); ?>"></script>
</body>

</html>