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
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
<table>
    <tr>
        <th>Description</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
    @foreach($products as $product)
        <tr>
            <td>{{$product->description}}</td>
            <td>{{$product->price}}</td>
            <td> <a href="javascript:void(0)" onclick="addToCart({{$product->id}})" >Add To Cart </a> </td>
        </tr>
    @endforeach
</table>
    <script>
        function addToCart(productId){

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '{{url('add-to-cart')}}',
                type: 'POST',
                data: {_token: CSRF_TOKEN, product_id:productId},
                success: function (data) {
                    swal("Success", "Product is Added",'success');
                }
            });
        }
    </script>
@endsection
