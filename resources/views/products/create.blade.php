@extends('app')

@section('content')
    <h1>New Product</h1>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route' => 'product_storage', 'method'=>'POST']) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::text('description', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('price', 'Price:') !!}
        {!! Form::text('price', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('featured', 'Featured?') !!}
        <br>
        {!! Form::radio('featured', 1) !!}
        {!! Form::label('featured', 'Yes') !!}
        {!! Form::radio('featured', 0) !!}
        {!! Form::label('featured', 'No') !!}
    </div>
    <div class="form-group">
        {!! Form::label('recommend', 'Recommend?') !!}
        <br>
        {!! Form::radio('recommend', 1) !!}
        {!! Form::label('recommend', 'Yes') !!}
        {!! Form::radio('recommend', 0) !!}
        {!! Form::label('recommend', 'No') !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Save', ['class'=>'btn btn-default']) !!}
    </div>
    {!! Form::close() !!}
@endsection
