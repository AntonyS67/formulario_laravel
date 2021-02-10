@extends('layouts.app')
@section('title','Usuarios')

@section('content')
    <form class="form row" action="{{action('UserController@store')}}" method="POST" id="user_add_form">
        @csrf
        <div class="mb-3">
            <label for="fullname" class="form-label">Nombres y Apellidos *</label>
            <input type="text" name="fullname" class="form-control form__input" id="fullname">
            <span class="text-danger d-none" id="span-fullname">Nombres y apellidos son necesarios</span>
        </div>
        <div class="mb-3">
            <label for="doc_type" class="form-label">Tipo de documento *</label>
            <select name="doc_type" id="doc_type" class="form-control form__input">
                <option value=""> -- Selecciona un tipo de documento -- </option>
                <option value="DNI">DNI</option>
                <option value="CARNETEX">Carnet de Extranjeria</option>
            </select>
            <span class="text-danger d-none" id="span-doc_type">Tipo de documento requerido</span>
        </div>
        <div class="mb-3">
            <label class="form-check-label"  for="number_doc ">Numero de documento *</label>
            <input type="text" class="form-control form__input" id="number_doc" name="number_doc" >
            <span class="text-danger d-none" id="span-number_doc">Numero de documento es requerido</span>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electronico *</label>
            <input type="email" name="email" class="form-control form__input" id="email" >
            <span class="text-danger d-none" id="span-email">Email es requerido</span>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña *</label>
            <input type="password" name="password" class="form-control form__input" id="password" >
            <span class="text-danger d-none" id="span-password">La contraseña es requerida</span>
        </div>
        <div class="mb-3">
            <label for="birthday" class="form-label">Fecha de Nacimiento</label>
            <input type="text" name="birthday" class="date form-control" id="birthday">  
        </div>
        <div class="mb-3  col-6">
            <label for="department" class="form-label">Departamento *</label>
            <select name="department" id="department" class="form-control form__input">
                <option value="">-- Selecciona un departamento --</option>
            </select>
            <span class="text-danger d-none" id="span-department">El departamento es necesario</span>
        </div>
        <div class="mb-3 col-6">
            <label for="province" class="form-label">Provincia *</label>
            <select name="province" id="province" class="form-control form__input">
                <option value="">-- Seleccione una provincia --</option>
            </select>
            <span class="text-danger d-none" id="span-province">La provincia es necesaria</span>
        </div>
        <div class="mb-3 col-6">
            <label for="distrit" class="form-label">Distrito *</label>
            <select name="distrit" id="distrit" class="form-control form__input">
                <option value="">-- Seleccione un distrito --</option>
            </select>
            <span class="text-danger d-none" id="span-distrit">El distrito es necesario</span>
        </div>
        <div class="mb-3 col-6">
            <label for="address" class="form-label">Direccion *</label>
            <input type="text" name="address" class="form-control form__input" id="address" >
            <span class="text-danger d-none" id="span-address">La direccion es necesaria</span>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-secondary" id="btn-clear">Limpiar</button>
        <div class="alert alert-danger alert-dismissible fade show d-none mt-5" role="alert" id="form-error">
            <strong>¡Error!</strong> Porfavor complete los campos marcados con *
        </div>
  </form>
@stop
@section('js')
  <script src="{{asset('js/user.js')}}"></script>
  <script>
      $('#birthday').datepicker({
          dateFormat: 'dd-mm-yy'
      })
  </script>
@endsection