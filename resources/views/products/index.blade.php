<!-- resources/views/products/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
</head>
<body>
    <h1>Products</h1>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <a href="{{ route('products.create') }}">Add Product</a>
    <ul>
        @foreach($products as $product)
            <li>
                <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                    <input type="text" name="id" value="{{ $product->id }}">
                    <input type="text" name="name" value="{{ $product->namaproduk }}">
                    <input type="text" name="price" value="{{ $product->hargaproduk }}">
                    <button type="submit">{{ $product->hargaproduk }} Add to Cart</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
