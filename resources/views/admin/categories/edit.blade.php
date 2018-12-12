@extends('admin.template.main')

@section('title', 'Editar la categoria '. $categoria->name)

@section('content')

	{!! Form::open(['route' => ['categories.update', $categoria], 'method' => 'PUT']) !!}
		<div class="form-group">
			{!! Form::label('name' , 'Nombre') !!}
			{!! Form::text('name', $categoria->name, ['class' => 'form-control', 'placeholder'=> 'Nombre completo', 'required']) !!}
		</div>
	
		<div class="form-group">
			{!! Form::submit('Editar', ['class'=>'btn btn-primary']) !!}
		</div>


	{!! Form::close() !!}

@endsection