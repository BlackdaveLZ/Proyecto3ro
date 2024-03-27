@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<div class="container">
    <h3 class="bg-info text-center">Generar Ordenes</h3>

    <form action="{{route('generarOrdenes')}}" method="POST" class="d-flex">
    @csrf
        <div class="form-group mr-2">
            <label for="periodos" class="mr-2">Periodo:</label>
            <select name="anl_id" id="anl_id" class="form-control">
                @foreach ($periodos as $p)
                <option value="{{ $p->id }}">{{ $p->anl_descripcion }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mx-2">
            <label for="jornadas" class="mr-2">Jornada:</label>
            <select name="jor_id" id="jor_id" class="form-control">
                @foreach ($jornadas as $j)
                <option value="{{ $j->id }}">{{ $j->jor_descripcion }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mx-2">
            <label for="meses" class="mr-2">Mes:</label>
            <select name="mes" id="mes" class="form-control">
                @foreach ($meses as $key => $m)
                <option value="{{$key}}">{{ $m }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" href="{{route('generarOrdenes')}}" class="btn btn-info">Generar Ordenes</button>
    </form>
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Secuencial</th>
            <th>Fecha</th>
            <th>Año lectivo</th>
            <th>Jornada</th>
            <th>Mes</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ordenes as $o)
        <tr> <!-- Agregué la etiqueta <tr> para cada fila -->
            <td>{{ $o->secuencial }}</td>
            <td>{{ $o->fecha_registro }}</td>
            <td>{{ $o->anl_descripcion }}</td>
            <td>{{ $o->jor_descripcion }}</td>
            <td>{{ $o->mes }}</td>
            <td class="d-flex">
                <a href="#" class="btn btn-success me-1"> <!-- Agregué "#" en el href -->
                    <span class="material-symbols-outlined">
                        visibility
                    </span>
                </a>
                <a href="#" class="btn btn-warning btn-sm me-1"> <!-- Agregué "#" en el href -->
                    <span class="material-symbols-outlined">edit</span>
                </a>
                <form action="#" method="POST"> <!-- Agregué "#" en el action -->
                    <button type="submit" class="btn btn-danger btn-sm-1">
                        <span class="material-symbols-outlined">delete</span>
                    </button>
                </form>
            </td>
        </tr> <!-- Agregué la etiqueta de cierre </tr> -->
        @endforeach
    </tbody>
</table>
@endsection
