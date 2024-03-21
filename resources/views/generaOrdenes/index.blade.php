@extends('layouts.app')
@section('content')
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
@endsection
