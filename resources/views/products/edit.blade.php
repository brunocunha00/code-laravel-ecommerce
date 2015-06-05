@extends('app')

@section('content')
    <h1>Edit product</h1>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route' => ['product_update', $product->id], 'method'=>'PUT']) !!}
    <div class="form-group">
        {!! Form::label('category', 'Category:') !!}
        {!! Form::select('category_id', $categories,  $product->category->id, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', $product->name, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::textarea('description', $product->description, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('price', 'Price:') !!}
        {!! Form::text('price', $product->price, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('tag', 'Tags: (separe por vírgulas)') !!}
        {!! Form::text('tag', $product->tagString, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('featured', 'Featured?') !!}
        <br>
        {!! Form::radio('featured', 1, $product->featured ) !!}
        {!! Form::label('featured', 'Yes') !!}
        {!! Form::radio('featured', 0, !$product->featured ) !!}
        {!! Form::label('featured', 'No') !!}
    </div>
    <div class="form-group">
        {!! Form::label('recommend', 'Recommend?') !!}
        <br>
        {!! Form::radio('recommend', 1, $product->recommend ) !!}
        {!! Form::label('recommend', 'Yes') !!}
        {!! Form::radio('recommend', 0, !$product->recommend ) !!}
        {!! Form::label('recommend', 'No') !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Edit', ['class'=>'btn btn-default']) !!}
    </div>
    {!! Form::close() !!}
@endsection
