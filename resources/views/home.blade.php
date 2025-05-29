@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} <!-- encabezado del panel de control --></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }} <!-- muestra el mensaje de estado si existe -->
                        </div>
                    @endif

                    {{ __('You are logged in!') }} <!-- mensaje de confirmación de inicio de sesión -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection