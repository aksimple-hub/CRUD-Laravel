@extends('layouts.base')

@section('contenido')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4 py-12">
        <div class="max-w-md w-full bg-white rounded-2xl shadow-xl p-8">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-bold text-gray-800">Crear Cuenta</h2>
                <a href="{{ url('/') }}" class="text-xs font-bold text-gray-400 hover:text-red-500 uppercase tracking-widest transition">
                    ✕ Cancelar
                </a>
            </div>

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 text-sm">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-gray-700">Nombre</label>
                    <input type="text" name="name" value="{{ old('name') }}" required class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700">Correo Electrónico</label>
                    <input type="email" name="email" value="{{ old('email') }}" required class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700">Contraseña</label>
                    <input type="password" name="password" required class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" required class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
                </div>

                <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg font-bold hover:bg-green-700 transition shadow-lg mt-4">
                    Completar Registro
                </button>
            </form>

            <div class="mt-6 text-center">
                <a href="{{ route('login') }}" class="text-sm text-gray-500 hover:text-indigo-600 transition">¿Ya tienes cuenta? Inicia sesión</a>
            </div>
        </div>
    </div>
@endsection
