@extends('admin.template.main')

@section('title', 'Lista de categorias')

@section('content')
	<a class="btn btn-info" href="{{ route('categories.create')}}"> Crear una nueva categoria </a>

	<table class="table table-striped">
		<thead>
			<th>ID</th>
			<th>Nombre</th>
			<th>Accion</th>
		</thead>
		<tbody>
			@foreach($categorias as $categoria)
				<tr>
					<td>{{ $categoria->id }}</td>
					<td>{{ $categoria->name }}</td>
					<td>
						<a href="{{  route('categories.edit', $categoria->id)}}" class="btn btn-warning"></a>
						<a href="{{ route('admin.categories.destroy', $categoria->id) }}" onclick="return confirm('posta lo queres eliminar esta categoria?')" class="btn btn-danger"></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	{!! $categorias->render() !!}
@endsection