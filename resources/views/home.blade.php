@extends('layouts.app')

@section('content')
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-center">
                    <p class="d-block text-uppercase">{{ __('Bienvenido') }} {{Auth::user()->fullname}}</p>
                    @auth
                        <button
                            class="btn btn-secondary btn-sm"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                            >Cerrar Sesion</button>   
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endauth
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p class="text-uppercase"><strong>Esta es tu información</strong></p>
                    <p><strong>Nombres y Apellidos:</strong> {{Auth::user()->fullname}}</p>
                    <p><strong>Tipo de documento:</strong> {{Auth::user()->doc_type}}</p>
                    <p><strong>Número de documento:</strong> {{Auth::user()->number_doc}}</p>
                    <p><strong>Correo Electrónico:</strong> {{Auth::user()->email}}</p>
                    <p><strong>Fecha de Nacimiento:</strong> {{Auth::user()->birthday}}</p>
                    <p><strong>Dirección:</strong> {{Auth::user()->address}}</p>
                </div>
            </div>
        </div>
</div>
@endsection
