@extends('layouts.app')
@section('title','Usuarios')

@section('content')
    <form class="form" action="{{action('UserController@store')}}" method="POST" id="user_add_form">
        @csrf
        <div class="mb-3">
            <label for="fullname" class="form-label">Nombres y Apellidos *</label>
            <input type="text" name="fullname" class="form-control" id="fullname" required>
        </div>
        <div class="mb-3 form-select">
            <label for="doc_type" class="form-label">Tipo de documento *</label>
            <select name="doc_type" id="doc_type" class="form-control" required>
                <option value=""> -- Selecciona un tipo de documento -- </option>
                <option value="DNI">DNI</option>
                <option value="CARNETEX">Carnet de Extranjeria</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-check-label"  for="number_doc">Numero de documento *</label>
            <input type="text" class="form-control" id="number_doc" name="number_doc" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electronico *</label>
            <input type="email" name="email" class="form-control" id="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña *</label>
            <input type="password" name="password" class="form-control" id="password" required>
        </div>
        <div class="mb-3">
            <label for="birthday" class="form-label">Fecha de Nacimiento</label>
            <input type="date" name="birthday" class="form-control" id="birthday">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Direccion *</label>
            <input type="text" name="address" class="form-control" id="address" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@stop
@section('js')
  <script src="{{asset('js/user.js')}}"></script>
@endsection