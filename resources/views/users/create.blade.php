@extends('layouts.app')
@section('content')
   <div class="container">
    <h2 class="text-center">Crear Nuevo Usuario</h2>
      <form action="{{ route('users.store') }}" method="POST">
        @csrf 
        @include('users.fields')
      </form>

   </div>
@endsection