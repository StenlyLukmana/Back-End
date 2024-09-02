@extends('layouts.main')

@section('container')

<div class="container" style="padding-top: 20px">
        <div class="card shadow">
        <div class="card-header text-center">{{ __('Checkout') }} </div>
            <div class="card-body">
                <form action="/create-invoice" method="POST" enctype="multipart/form-data">
                    @CSRF

                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <input name="address" type="text" class="form-control" id="formGroupExampleInput" placeholder="Input alamat">
                        @error('address')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="postal" class="form-label">Kode Postal</label>
                        <input name="postal" type="text" class="form-control" id="formGroupExampleInput" placeholder="Input kode pos">
                        @error('postal')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <strong>Total Harga:</strong>
                        <label for="total" class="form-label">Rp.{{ number_format($carts->sum('subtotal'), 2, ',', '.') }}</label>
                        <input type="hidden" name="total" value="{{ $carts->sum('subtotal') }}">
                    </div>

                    <button type="submit" class="btn btn-success">Checkout</button>

                </form>
            </div>
        </div>
    </div>

@endsection