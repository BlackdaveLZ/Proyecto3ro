@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

<h3 class="text-center">Esta es la vista de Cursos</h3>
<a href="{{ route('cursos.create') }}" class="btn btn-info">Nuevo Curso</a>
    
    <table class="table">

        <tr>
            <th>#</th>
            <th>Titulo</th>
            <th>Descripcion</th>
            <th>Grupo</th>
            <th>Estado</th>
            <th>Acciones</th>
            
        </tr>

        @foreach($cursos as $c)
           
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $c->cur_titulo }}</td>
            <td>{{ $c->cur_descripcion }}</td>
            <td>{{ $c->cur_grupo }}</td>
            <td>{{ $c->cur_estado==1?'Activo':'Inactivo' }}</td>
            <td>
                
            <a href="{{ route('cursos.edit',$c->cur_id) }}" class="btn btn-info btn-sm">
            <span class="material-symbols-outlined">
edit
</span> 
</a>
            
            <form action="{{ route('cursos.destroy',$c->cur_id)}}" method="POST" onsubmit="return confirm('Desea eliminar el curso?')">

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