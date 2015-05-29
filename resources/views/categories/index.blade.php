@extends('app')

@section('content')
    <h1>Categories</h1>

    <a href="{{route('category_create')}}" class="btn btn-default">New Category</a>


    <table class="table">
    	<thead>
    		<tr>
    			<th>ID</th>
    			<th>Name</th>
    			<th>Description</th>
    			<th>Action</th>
    		</tr>
    	</thead>
    	<tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td><a href="{{ route('category_edit', $category->id) }}" class="btn btn-default">Edit</a> <a href="{{ route('category_delete', $category->id) }}" class="btn btn-default">Delete</a></td>
                </tr>
            @endforeach

    	</tbody>
    </table>

@endsection
