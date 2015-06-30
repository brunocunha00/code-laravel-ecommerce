@extends('store.store')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Profile</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
                    {!! Form::open(['route' => 'profile_storage', 'method' => 'POST']) !!}

						<div class="form-group">
                            {!! Form::label('address', 'Address:') !!}
                            {!! Form::text('address', isset($profile->address)?$profile->address:'', ['class'=>'form-control']) !!}
						</div>

						<div class="form-group">
							    {!! Form::label('complement', 'Complement:') !!}
							    {!! Form::text('complement', isset($profile->complement)?$profile->complement:'', ['class'=>'form-control']) !!}
						</div>
                        <div class="form-group">
                            {!! Form::label('cep', 'Cep:') !!}
                            {!! Form::text('cep', isset($profile->cep)?$profile->cep:'', ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('city', 'City:') !!}
                            {!! Form::text('city', isset($profile->city)?$profile->city:'', ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('state', 'State:') !!}
                            {!! Form::text('state', isset($profile->state)?$profile->state:'', ['class'=>'form-control']) !!}
                        </div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Register
								</button>
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
