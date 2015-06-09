@extends('app')

@section('content')
    <h1>Images of {{ $product->name }}</h1>

    <a href="{{route('product_image_create', $product->id)}}" class="btn btn-default">New Image</a>
    <a href="{{route('product_index')}}" class="btn btn-default">Back</a>

    <table class="table">
    	<thead>
    		<tr>
    			<th>ID</th>
    			<th>Image</th>
    			<th>Extension</th>
    			<th>Action</th>
    		</tr>
    	</thead>
    	<tbody>
            @foreach($product->images as $image)
                <tr>
                    <td>{{ $image->id }}</td>
                    <td><img src="{{url('images/products/'. $image->id . '.' . $image->extension) }}" alt="{{ $product->name }}" width="50px"/></td>
                    <td>{{ $image->extension }}</td>
                    <td><a href="{{ route('product_image_delete', $image->id) }}" class="btn btn-default">Delete</a></td>
                </tr>
            @endforeach

    	</tbody>
    </table>

@endsection
