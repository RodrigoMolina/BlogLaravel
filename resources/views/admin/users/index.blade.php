@extends('admin.template.main')

@section('title', 'Lista de usuarios')


@section('content')

	<a href="{{route('users.create')}}" class="btn btn-info">Registrar un nuevo usuario</a> <hr>
	<table class="table">
			<thead>
				<th>ID</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>Tipo</th>
				<th>Accion</th>
			</thead>
			<tbody>
				@foreach($users as $user)
				<tr>
					<td>{{ $user->id }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>
						@if($user->type == "admin")
							<span class="btn btn-danger">	{{ $user->type }}
							</span>
						@else
							<span class="btn btn-secondary">	{{ $user->type }}
							</span>
						@endif
					</td>
					<td><a href="{{  route('users.edit', $user->id)}}" class="btn btn-warning"></a> <a href="{{ route('admin.users.destroy', $user->id) }}" onclick="return confirm('posta lo queres eliminar a este che?')" class="btn btn-danger"></a></td>
				</tr>
				@endforeach
			</tbody>

	</table>
	{!! $users->render() !!}

@endsection