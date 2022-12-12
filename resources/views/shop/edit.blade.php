@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Shop') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('shop.update',array($shop->id)) }}" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        @include('shop.form')

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                                <a href="{{ route('shop.index') }}" class="btn btn-danger">Cancel</a>        
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
