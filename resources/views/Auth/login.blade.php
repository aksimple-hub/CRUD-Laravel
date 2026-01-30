@extends('layouts.base')

@section('contenido')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
        <div class="max-w-md w-full bg-white rounded-2xl shadow-xl p-8">
            {{-- Botón Volver arriba --}}
            <div class="mb-6">
                <a href="{{ url('/') }}" class="inline-flex items-center text-sm text-gray-400 hover:text-indigo-600 transition font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Volver al inicio
                </a>
            </div>

            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800">Iniciar Sesión</h2>
                <p class="text-gray-500 mt-2">Accede a la Gestión de Alumnos</p>
            </div>

            {{-- Mostrar errores de validación --}}
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 text-sm">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-gray-700">Correo Electrónico</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full mt-1 px-4 py-3 border rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none transition">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700">Contraseña</label>
                    <input type="password" name="password" required class="w-full mt-1 px-4 py-3 border rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none transition">
                </div>

                <button type="submit" class="w-full bg-indigo-600 text-white py-3 rounded-lg font-bold hover:bg-indigo-700 transition shadow-lg">
                    Entrar al Sistema
                </button>
            </form>

            <div class="mt-6 text-center">
                <a href="{{ route('register') }}" class="text-sm text-indigo-600 font-bold hover:underline">¿No tienes cuenta? Regístrate</a>
            </div>
        </div>
    </div>
@endsection
