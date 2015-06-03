@extends('app')

@section('content')
    <h1>Products</h1>

    <a href="{{route('product_create')}}" class="btn btn-default">New Product</a>


    <table class="table">
    	<thead>
    		<tr>
    			<th>ID</th>
    			<th>Name</th>
    			<th>Description</th>
    			<th>Price</th>
    			<th>Featured</th>
    			<th>Recommended</th>
    			<th>Category</th>
    			<th>Action</th>
    		</tr>
    	</thead>
    	<tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ ($product->featured)?'Yes':'No' }}</td>
                    <td>{{ ($product->recommend)?'Yes':'No' }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td><a href="{{ route('product_image_index', $product->id) }}" class="btn btn-default"><span class="glyphicon glyphicon-camera"></span></a><a href="{{ route('product_edit', $product->id) }}" class="btn btn-default">Edit</a> <a href="{{ route('product_delete', $product->id) }}" class="btn btn-default">Delete</a></td>
                </tr>
            @endforeach

    	</tbody>
    </table>
    {!! $products->render() !!}

@endsection
