@extends('app')

@section('content')
    <h1>New Image of {{ $product->name }}</h1>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route' => ['product_image_storage', $product->id], 'method'=>'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::label('image', 'Image:') !!}
        {!! Form::file('image', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Upload', ['class'=>'btn btn-default']) !!}
    </div>
    {!! Form::close() !!}
@endsection
