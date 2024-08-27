@extends('admindashboard.layout')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">

                @if(session('success'))
                    <div class="alert alert-success fade show" role="alert" style="display: block;">
                        {{session('success')}}
                        <script>
                            setTimeout(function() {
                                $('.alert').alert('close');
                            }, 3000);
                        </script>
                    </div>
                @endif

                @if(session('errors'))
                    <div class="alert alert-danger fade show" role="alert" style="display: block;">
                        {{session('errors')}}
                        <script>
                            setTimeout(function() {
                                $('.alert').alert('close');
                            }, 3000);
                        </script>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header d-flex justify-content-between bg-primary text-white">
                        <strong>Tambah Produk</strong>
                        <a href="/admin/produk" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </div>
                    <div class="card-body">
                            
                    <a href="/admin/produk/tambah" class="btn btn-success">Produk</a>
                    <a href="/admin/kategori" class="btn btn-success">Kategori</a>

                    <div style="margin-bottom:20px">
                        <div class="row">
                            

                            <div class="col-md-4">
                                <div class="card border border-primary shadow p-3" style="border: 1px solid;">
                                    Ubah Kategori

                                    <hr style="border-color: purple;border:2px solid">
                                    
                                    <div class="card-body">
                                        <form action="/admin/kategori/update/" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $dataedit->id }}">
                                            <div class="form-group">
                                                <label for="judul" class="col-sm-12 col-form-label">Nama Kategori</label>
                                                <input type="text" name="namakategori" class="form-control" value="{{ $dataedit->namakategori }}">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="gambar" class="col-sm-12 col-form-label">Icon Kategori</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="gambaricon" name="gambaricon" onchange="previewFile(this)">
                                                    <label class="custom-file-label" for="gambar">Pilih Icon</label>
                                                </div>
                                                <br>
                                                <div class="custom-file">
                                                    <img id="previewIcon" src="{{ $dataedit->gambaricon ? asset('image/icon/'.$dataedit->gambaricon) : '' }}" alt="Preview Icon" style="max-width: 100%;height: auto;display:none;">
                                                </div>
                                            </div>

                                            <script>
                                                function previewFile(input){
                                                    var file = $("#gambaricon").get(0).files[0];
                                                    if(file){
                                                        var reader = new FileReader();
                                                        reader.onload = function(){
                                                            $("#previewIcon").attr("src",reader.result).css("display","block");
                                                        }
                                                        reader.readAsDataURL(file);
                                                    }
                                                }
                                            </script>


                                            <div class="form-group">
                                                <button class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-8">
                                <div class="card border border-primary shadow p-3" style="border: 1px solid; padding: 10px;">
                                    Data Kategori
                                    <hr style="border-color: purple;border:2px solid">
                                    <div class="card-body">
                                        <table class="table table-bordered table-striped"  id="tabel-data">
                                            <thead>
                                                <tr>
                                                    <th>Nama Kategori</th>
                                                    <th>Icon</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($kategoris as $kategori)
                                                <tr>
                                                    <td>{{ $kategori->namakategori }}</td>
                                                    <td>
                                                        @if($kategori->icon)
                                                            <img src="/images/icon/{{ $kategori->icon }}" alt="{{ $kategori->icon }}" class="img-fluid">
                                                        @endif
                                                    </td>
                                                    <td><a href="{{ url('/admin/kategori/'.$kategori->id) }}" class="btn btn-sm btn-primary">Edit</a></td>
                                                    <td><a href="{{ url('/admin/kategori/hapus/'.$kategori->id) }}" class="btn btn-sm btn-danger">Hapus</a></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                          
                </div>
            </div>
        </div>
    </div>


<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

<script>
    $(document).ready(function(){
        $('#tabel-data').DataTable();
    });

    window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
    }, 2000);

</script>
@endsection

