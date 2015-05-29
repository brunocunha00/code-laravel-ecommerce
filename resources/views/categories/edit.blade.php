@extends('app')

@section('content')
    <h1>Edit Category</h1>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route' => ['category_update', $category->id], 'method'=>'PUT']) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', $category->name, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::textarea('description', $category->description, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Edit', ['class'=>'btn btn-default']) !!}
    </div>
    {!! Form::close() !!}
@endsection
