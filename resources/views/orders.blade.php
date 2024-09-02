@extends('layouts.main')

@section('container')

    @if($invoices->isEmpty())
        <p>No orders found.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nomor Faktur</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Postal</th>
                    <th scope="col">Total Harga</th>
            </thead>
            <tbody>
                @foreach($invoices as $invoice)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$invoice->invoice_id}}</td>
                        <td>{{$invoice->address}}</td>
                        <td>{{$invoice->postal}}</td>
                        <td>Rp.{{ number_format($invoice->total, 2, ',', '.') }}</td>
                @endforeach
                
            </tbody>
        </table>
    @endif

@endsection