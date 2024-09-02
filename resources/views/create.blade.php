@extends('layouts.main')

@section('container')

<div class="container" style="padding-top: 20px">
        <div class="card shadow">
        <div class="card-header text-center">{{ __('INPUT ITEM BARU') }} </div>
            <div class="card-body">
                <form action="{{ route('createItem')}}" method="POST" enctype="multipart/form-data">
                    @CSRF

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Item</label>
                        <input name="name" type="text" class="form-control" id="formGroupExampleInput" placeholder="Input nama">
                        @error('name')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Harga</label>
                        <input name="price" type="number" class="form-control" id="formGroupExampleInput" placeholder="Input harga">
                        @error('price')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label">Jumlah Tersedia</label>
                        <input name="quantity" type="number" class="form-control" id="formGroupExampleInput" placeholder="Input jumlah">
                        @error('quantity')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label">Kategori</label>
                        <select name="category_id" id="">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar</label>
                        <input name="image" type="file" class="form-control" id="formGroupExampleInput">
                        @error('image')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">Simpan</button>

                </form>
            </div>
        </div>
    </div>

@endsection