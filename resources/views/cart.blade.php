@extends('layouts.main')

@section('container')

<div class="container" style="padding-top: 20px">
    <div class="card shadow">
        <div class="card-header text-center">{{ __('ORDERED ITEMS') }} </div>
        <div class="card-body">
            @if($carts->isEmpty())
                <p>Tidak ada item dalam keranjang.</p>
                <p>Total Harga: Rp.{{ number_format(0, 2, ',', '.') }}</p>
                <a href="/catalogue"><button type="button" class="btn btn-primary col-md">Telusuri katalog</button></a>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Image</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Category</th>
                            <th scope="col">Ordered</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Cart</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($carts as $cart)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><img src="{{asset('storage/Image/'.$cart->item->image)}}" alt="{{ $cart->item->name }}" style="height: 90px"></td>
                                <td>{{$cart->item->name}}</td>
                                <td>Rp.{{ number_format($cart->item->price, 2, ',', '.') }}</td>
                                <td>{{$cart->item->category->name}}</td>
                                <td>{{$cart->quantity}}</td>
                                <td>Rp.{{ number_format($cart->subtotal, 2, ',', '.') }}</td>
                                <td>
                                    <form action="/remove-cart-item/{{ $cart->id }}" method="POST">
                                        @CSRF
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger col-md">Hapus dari Keranjang</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="7" class="text-end"><strong>Total Harga:</strong></td>
                            <td>Rp.{{ number_format($carts->sum('subtotal'), 2, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
                <a href="/checkout"><button type="submit" class="btn btn-success col-md">Cetak Faktur</button></a>
            @endif
        </div>
    </div>
</div>

@endsection
