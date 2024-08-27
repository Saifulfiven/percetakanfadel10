@extends('Landingpage.layout')

@section('content')

<section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <h1>Keranjang Belanja</h1>
                @if(session('success'))
                    <div>{{ session('success') }}</div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0; ?>
                        @foreach($cartItems as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <form action="{{ route('cart.update', $item->rowId) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="number" name="qty" value="{{ $item->qty }}">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i>update</button>
                                    </form> 
                                </td>
                                <td>Rp. {{ number_format($item->price, 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                <td>
                                    <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>

                            <?php $total += $item->subtotal ?>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>

                <div class="row pb-3">
                    <div class="col-md-8 d-grid">
                        <h2>Total: Rp. <?php echo number_format($total, 0, ',', '.'); ?></h2>
                    </div>
                    <div class="col-md-2 d-grid mb-3">
                        <a href="/" class="btn btn-success">Lanjutkan Belanja</a>
                    </div>
                    <div class="col-md-2 d-grid">
                        <a href="/selesaipembelian" class="btn btn-primary">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
