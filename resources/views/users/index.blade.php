@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />


<h2 class="text-center">Lista Usuarios</h2>
<a href="{{ route('users.create') }}" class="btn btn-info">Nuevo Usuario</a>
<table class="table">
    <tr>
        <th>#</th>
        <th>Usuario </th>
        <th>Roles   </th>
        <th>Nombre </th>
        <th>Correo </th>
        <th>Contraseña</th>
        <th>Telefono</th>
        <th>Acciones</th>
        
    </tr>
    @foreach($users as $user)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->rol_descripcion}}</td>
        <td>{{$user->usu_nombres}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->password}}</td>
        <td>{{$user->usu_telefono}}</td>
        <td>


        <a href="{{ route('users.edit',$user->usu_id) }}" class="btn btn-info btn-sm">
            <span class="material-symbols-outlined">
edit
</span> 
</a>
            
            <form action="{{ route('users.destroy',$user->usu_id)}}" method="POST" onsubmit="return confirm('Desea eliminar el Usuario?')">

            @csrf
            @method('DELETE')
            <button type="submit" class="bg-warning btn btn-warning btn-sm"><span class="material-symbols-outlined">
delete
</span>
</button>

        </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection