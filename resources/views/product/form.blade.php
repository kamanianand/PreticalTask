<div class="row mb-3">
    <label for="product_name" class="col-md-4 col-form-label text-md-end">Product Name</label>
    <div class="col-md-6">
        <input id="product_name" type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{ isset($product->product_name) ? $product->product_name : old('product_name')  }}" required autocomplete="off">

        @error('product_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="price" class="col-md-4 col-form-label text-md-end">Price</label>
    <div class="col-md-6">
        <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ isset($product->price) ? $product->price : old('price')  }}" required autocomplete="off">

        @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="company" class="col-md-4 col-form-label text-md-end">Shop Name</label>
    <div class="col-md-6">
        <select name="shop_id" class="form-control" required>
            <option value="">Select</option>
            @if(!empty($shops))
                @foreach($shops as $shop)
                    @if(isset($product->shop_id) && $product->shop_id == $shop->id)
                        <option value="{{ $shop->id }}" selected="selected">{{ $shop->shop_name }}</option>
                    @else
                        <option value="{{ $shop->id }}">{{ $shop->shop_name }}</option>
                    @endif
                @endforeach
            @endif
        </select>
    </div>
</div>

<div class="row mb-3">
    <label for="company" class="col-md-4 col-form-label text-md-end">Stock</label>
    <div class="col-md-6">
        <select name="stock" class="form-control" required>
            <option value="">Select</option>
            <option value="{{ 'yes' }}" @if(isset($product->stock) && $product->stock == 'yes') selected="selected" @endif>{{ 'Yes' }}</option>
            <option value="{{ 'no' }}" @if(isset($product->stock) && $product->stock == 'no') selected="selected" @endif>{{ 'No' }}</option>
        </select>
    </div>
</div>

<div class="row mb-3">
    <label for="video" class="col-md-4 col-form-label text-md-end">Video</label>

    <div class="col-md-6">
        <input id="video" type="file" class="form-control" name="video">
        <input type="hidden" name="old_video" value="{{ isset($product->video) ? $product->video : '' }}">
    </div>
</div>

@if(isset($product->video) && !empty($product->video))
    <div class="row mb-3">
        <label for="video" class="col-md-4 col-form-label text-md-end"></label>
        <div class="col-md-6">
            <?php $file = public_path('storage/'.$product->video);?>
            @if(File::exists($file))
            <video width="320" height="240" poster="{{asset('storage/app/public/')}}/{{$product->video}}" controls>
               <source src="{{asset('storage/app/public/')}}/{{$product->video}}" type="video/mp4">
            </video>
            @endif
        </div>
    </div>
@endif