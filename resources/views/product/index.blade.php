@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<a class="btn btn-success float-right ml-2" href="{{ route('product.create') }}">Create New Product</a>
            <a class="btn btn-success float-right ml-2" href="{{ route('importView') }}">Import</a>
            <a class="btn btn-success float-right ml-2" href="{{ route('exportProduct') }}">Export</a>
            <br><br>
        	<hr>
            <h4>Filter</h4>
            <hr>
            <form method="get" action="{{ route('product.index')}}">
                <div class="row">
                    <div class="col-md-3">
                        <input id="price" type="number" class="form-control" name="filter[min]" value="{{ isset($filter['min']) ? $filter['min'] : '' }}" placeholder="min price" autocomplete="off">
                    </div>
                    <div class="col-md-3">
                        <input id="price" type="number" class="form-control" name="filter[max]" value="{{ isset($filter['max']) ? $filter['max'] : '' }}" placeholder="max price" autocomplete="off">
                    </div>                    
                    <div class="col-md-6">
                        <select name="filter[stock]" class="form-control">
                            <option value="">Select</option>
                            <option value="{{ 'yes' }}" @if(isset($filter['stock']) && $filter['stock'] == 'yes') selected="selected" @endif>{{ 'Yes' }}</option>
                            <option value="{{ 'no' }}" @if(isset($filter['stock']) && $filter['stock'] == 'no') selected="selected" @endif>{{ 'No' }}</option>
                        </select>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">
                    {{ __('Search') }}
                </button>
                <a href="{{ route('product.index') }}" class="btn btn-danger">Cancel</a>    
            </form>
            <br><br>
            <div class="card">
                <div class="card-header">{{ __('Product List') }}</div>
                <div class="card-body">
                    <table class="table">
                    	<tr>
                    		<th>Sr.no</th>
                    		<th>Product Name</th>
                    		<th>Price</th>
                    		<th>Stock</th>
                            <th>Shop Name</th>                            
                            <th>Video</th>                            
                            <th>Status</th>
                    		<th>Action</th>
                    	</tr>

                    	@if(!empty($products))
                    		@foreach($products as $k => $product)
                    			<tr>
                    				<td>{{ $k+1 }}</td>
                    				<td>{{ $product->product_name }}</td>
                    				<td>{{ $product->price }}</td>
                    				<td>{{ $product->stock }}</td>
                                    <td>{{ $product->shops->shop_name }}</td>
                                    <td>
                                        <?php $file = public_path('storage/'.$product->video);?>
                                        @if(File::exists($file))
                                            <video width="200" height="100" poster="{{asset('storage/app/public/')}}/{{$product->video}}" controls>
                                               <source src="{{asset('storage/app/public/')}}/{{$product->video}}" type="video/mp4">
                                            </video>
                                        @else
                                            <img src="{{asset('public/placeholder.png')}}" height="100px;" width="100px;">
                                        @endif
                                    </td>
                                    <td>
                                        @if($product->status == 1)
                                            <span class="label label-success">{{ 'Active' }}</span>
                                        @else
                                            <span class="label label-danger">{{ 'Deactive' }}</span>
                                        @endif
                                    </td>
                    				<td>
                    					<a class="btn btn-primary" href="{{ route('product.edit',array($product->id)) }}">Edit</a>
                                        <form class="" action="{{ url('product/destroy') }}" method="post">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                          <input type="hidden" name="id" value="{{$product->id}}">
                                          {{ method_field('DELETE') }}
                                          {!! csrf_field() !!}
                                        </form>
                    				</td>
                    			</tr>
                    		@endforeach
                    	@endif
                    </table>

                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection