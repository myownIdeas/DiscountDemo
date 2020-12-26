@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                   <select class="form-control">
                     @foreach($customers as $customer)
                       <option value="{{$customer->id}}">{{$customer->name}}</option>
                     @endforeach
                   </select>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
