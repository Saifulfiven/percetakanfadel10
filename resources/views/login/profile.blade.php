@extends('landingpage.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <br>
                <div class="panel-heading"><strong><h3>Profil</h3></strong></div>
                <div class="panel-body">
                    <p><strong>Nama : </strong><br>{{ $user->namalengkap }}</p>
                    <p><strong>Alamat : </strong><br>{{ $user->alamat }}</p>
                    <p><strong>Kontak : </strong><br>{{ $user->no_hp }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
