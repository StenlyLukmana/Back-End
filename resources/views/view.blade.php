@extends('layouts.main')

@section('container')

    <div class="container" style="padding-top: 20px">
        <div class="card shadow">
            <div class="card-header text-center">{{ __('LIST ITEM') }} </div>
                <div class="card-body">
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Nama</th>
                                <th scope="col">harga</th>
                                <th scope="col">Tersedia</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Jumlah Dipesan</th>
                                <th scope="col">Keranjang</th>
                                @can('admin')
                                    <th scope="col">Edit</th>
                                    <th scope="col">Hapus</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><img src="{{asset('storage/Image/'.$item->image)}}" alt="{{ $item->name }}" style="height: 90px"></td>
                                <td>{{$item->name}}</td>
                                <td>Rp.{{ number_format($item->price, 2, ',', '.') }}</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->category->name}}</td>
                                <form action="{{ route('cartStore')}}" method="POST">
                                        @CSRF
                                        <input type="hidden" name="item_id" value="{{ $item->id }}">
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <td><input type="number" name="quantity" value="1"></td>
                                        <td><button type="submit" class="btn btn-danger col-md">Masukkan dalam keranjang</button></td>
                                </form>
                                @can('admin')
                                    <td>
                                        <a href="/update/{{$item->id}}"><button type="submit" class="btn btn-success col-md">Edit</button></a>
                                    </td>
                                    <td>
                                        <form action="{{ route('deleteItem', ['id' => $item->id])}}" method="POST">
                                            @CSRF
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger col-md">Hapus</button>
                                        </form>
                                    </td>
                                @endcan
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
        </div>
    </div>

@endsection