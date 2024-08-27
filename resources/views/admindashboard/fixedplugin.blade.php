 <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg ">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Profil User</h5>
           </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-0 pt-md-4">
        <div class="row">
          <div class="col-md-12">
            <div class="card-profile-image">
              <a href="javascript:;">
                <img src="{{ asset('images/profil/fotoprofil.jpg') }}" class="rounded-circle" width="100%">
              </a>
            </div>
            <div class="card-profile-data">
              <h6 class="mb-0">Faril</h6>
              
              <p class="mb-0">
                Nama Lengkap: Faril Syukur
              </p>
              <p class="mb-0">
                Jabatan : Admin
              </p>
            </div>
          </div>

          <div class="col-md-12 mt-4">
            <button class="btn btn-primary" onclick="toggleForm()">Tambah Data User</button>
         
          
          <div class="d-none" id="formInput">
            <form action="" method="post">
              @csrf
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
              </div>
              <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
          </div>
          <script>
            function toggleForm() {
              var formInput = document.getElementById('formInput');
              formInput.classList.toggle('d-none');
            }
          </script>
        </div>
      </div>
    </div>
  </div>