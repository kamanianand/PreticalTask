@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Import Product') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('importProduct') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="company" class="col-md-4 col-form-label text-md-end">Shop Name</label>
                            <div class="col-md-6">
                                <select name="shop_id" class="form-control" required>
                                    <option value="">Select</option>
                                    @if(!empty($shops))
                                        @foreach($shops as $shop)
                                            <option value="{{ $shop->id }}">{{ $shop->shop_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                            <div class="col-md-6">
                                <input type="file" name="file" class="custom-file-input" id="customFile">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                                <a href="{{ route('product.index') }}" class="btn btn-danger">Cancel</a>    
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
