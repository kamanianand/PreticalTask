<div class="row mb-3">
    <label for="shop_name" class="col-md-4 col-form-label text-md-end">Shop Name</label>
    <div class="col-md-6">
        <input id="shop_name" type="text" class="form-control @error('shop_name') is-invalid @enderror" name="shop_name" value="{{ isset($shop->shop_name) ? $shop->shop_name : old('shop_name')  }}" required autocomplete="off">

        @error('shop_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>
    <div class="col-md-6">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ isset($shop->email) ? $shop->email : old('email')  }}" required autocomplete="off">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="address" class="col-md-4 col-form-label text-md-end">Address</label>
    <div class="col-md-6">
        <textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address"required autocomplete="off">{{ isset($shop->address) ? $shop->address : old('address')  }}</textarea>

        @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="image" class="col-md-4 col-form-label text-md-end">Image</label>

    <div class="col-md-6">
        <input id="image" type="file" class="form-control" name="image">
        <input type="hidden" name="old_image" value="{{ isset($shop->image) ? $shop->image : '' }}">
    </div>
</div>

@if(isset($shop->image) && !empty($shop->image))
    <div class="row mb-3">
        <label for="image" class="col-md-4 col-form-label text-md-end"></label>
        <div class="col-md-6">
            <?php $file = public_path('storage/'.$shop->image);?>
            @if(File::exists($file)) 
                <img src="{{asset('storage/app/public/')}}/{{$shop->image}}" height="100px;" width="100px;">        
            @endif
        </div>
    </div>
@endif