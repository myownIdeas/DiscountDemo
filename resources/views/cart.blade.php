@extends('layouts.app')

@section('content')
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
<h2>Products</h2>

<table>
    <tr>
        <th>Description</th>
        <th>Price</th>
    </tr>
    @foreach($products as $product)
        <tr>
            <td>{{$product->productRel->description}}</td>
            <td>{{$product->productRel->price}}</td>

        </tr>
    @endforeach
</table>
    <br />
    <div class="text-center">

    <a href="{{url('place-order')}}" style="text-align: center" class="btn btn-success">CheckOut</a>
    </div>
@endsection
