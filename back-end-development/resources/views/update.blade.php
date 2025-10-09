@extends('layouts.main')

@section('container')

    <div class="container" style="padding-top: 20px">
        <div class="card shadow">
        <div class="card-header text-center">{{ __('UPDATE ITEM') }} </div>
            <div class="card-body">
                <form action="/update-item/{{ $item->id }}" method="POST" enctype="multipart/form-data">
                    @CSRF
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Item</label>
                        <input name="name" value="{{$item->name}}" type="text" class="form-control" id="formGroupExampleInput" placeholder="Input nama">
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Harga</label>
                        <input name="price"  value="{{$item->price}}" type="number" class="form-control" id="formGroupExampleInput" placeholder="Input harga">
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label">Jumlah Tersedia</label>
                        <input name="quantity"  value="{{$item->price}}" type="number" class="form-control" id="formGroupExampleInput" placeholder="Input jumlah">
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label">Kategori</label>
                        <select name="category_id" id="">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $item->category_id ? 'selected' : '' }} > {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Ubah</button>

                </form>
            </div>
        </div>
    </div>

@endsection