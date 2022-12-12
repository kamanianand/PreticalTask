@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <ul class="list-group list-group-horizontal-sm">
                        <li class="list-group-item">
                            <a href="{{ route('shop.index') }}">Shop</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('product.index') }}">Product</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
