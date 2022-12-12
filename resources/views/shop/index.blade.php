@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<a class="btn btn-success float-right" href="{{ route('shop.create') }}">Create New Shop</a>
            <br><br>
            <div class="card">
                <div class="card-header">{{ __('Shop List') }}</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        	<tr>
                        		<th>Sr.no</th>
                        		<th>Shop Name</th>
                                <th>Image</th>
                        		<th>Email</th>
                        		<th>Address</th>
                                <th>Status</th>
                        		<th>Action</th>
                        	</tr>
                        </thead>
                        <tbody>
                        	@if(!empty($shops))
                        		@foreach($shops as $k => $shop)
                        			<tr>
                        				<td>{{ $k+1 }}</td>
                        				<td>{{ $shop->shop_name }}</td>
                        				<td>
                                            <?php $file = public_path('storage/'.$shop->image);?>
                                            @if(File::exists($file) && !empty($shop->image))
                                                <img src="{{asset('storage/app/public')}}/{{$shop->image}}" height="100px;" width="100px;">
                                            @else
                                                <img src="{{asset('public/placeholder.png')}}" height="100px;" width="100px;">
                                            @endif            
                                        </td>
                                        <td>{{ $shop->email }}</td>
                                        <td>{{ $shop->address }}</td>
                                        <td>
                                            @if($shop->status == 1)
                                                <span class="label label-success">{{ 'Active' }}</span>
                                            @else
                                                <span class="label label-danger">{{ 'Deactive' }}</span>
                                            @endif
                                        </td>
                        				<td>
                        					<a class="btn btn-primary" href="{{ route('shop.edit',array($shop->id)) }}">Edit</a>
                                            <form action="{{ url('shop/destroy') }}" method="post">
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                              <input type="hidden" name="id" value="{{$shop->id}}">
                                              {{ method_field('DELETE') }}
                                              {!! csrf_field() !!}
                                            </form>
                        				</td>
                        			</tr>
                        		@endforeach
                        	@endif
                        </tbody>
                    </table>

                    {{ $shops->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection