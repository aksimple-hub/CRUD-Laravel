@extends('layouts.base')

@section('contenido')
    <div class="max-w-4xl mx-auto p-8 bg-white shadow-lg rounded-lg mt-10">
        <div class="flex justify-between items-center mb-6 border-b pb-4">
            {{-- Título traducido manteniendo el nombre del alumno --}}
            <h2 class="text-2xl font-bold text-gray-800">
                {{ __('messages.edit') }}: {{ $alumno->Nombre }}
            </h2>
            <a href="{{ url('/alumno') }}" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                ← {{ __('messages.back') }}
            </a>
        </div>

        <form action="{{ url('/alumno/' . $alumno->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            {{ method_field('PATCH') }}

            {{-- Bloque de nombres --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">{{ __('messages.first_name') }}</label>
                    <input type="text" name="Nombre" value="{{ $alumno->Nombre }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">{{ __('messages.last_name') }}</label>
                    <input type="text" name="Apellido" value="{{ $alumno->Apellido }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        {{ App::getLocale() == 'es' ? 'Segundo Apellido' : (App::getLocale() == 'fr' ? 'Deuxième Nom' : 'Second Last Name') }}
                    </label>
                    <input type="text" name="SegundoApellido" value="{{ $alumno->SegundoApellido }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
                </div>
            </div>

            {{-- Bloque de Identificación y Contacto --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">{{ __('messages.dni') }}</label>
                    <input type="text" name="DNI" value="{{ $alumno->DNI }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">{{ __('messages.email') }}</label>
                    <input type="email" name="Correo" value="{{ $alumno->Correo }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">{{ __('messages.phone') }}</label>
                    <input type="text" name="Telefono" value="{{ $alumno->Telefono }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
                </div>
            </div>

            {{-- Foto --}}
            <div class="mt-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    {{ App::getLocale() == 'es' ? 'Foto Actual' : (App::getLocale() == 'fr' ? 'Photo Actuelle' : 'Current Photo') }}
                </label>
                @if($alumno->Foto)
                    <img src="{{ asset('storage/'.$alumno->Foto) }}" class="w-20 h-20 rounded-lg mb-2 shadow-sm">
                @endif
                <input type="file" name="Foto" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-indigo-50 file:text-indigo-700">
            </div>

            {{-- Botones --}}
            <div class="flex items-center justify-end space-x-4 pt-6 border-t mt-6">
                <a href="{{ url('/alumno') }}" class="px-5 py-2.5 bg-white border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition">
                    {{ App::getLocale() == 'es' ? 'Cancelar' : (App::getLocale() == 'fr' ? 'Annuler' : 'Cancel') }}
                </a>
                <button type="submit" class="px-8 py-2.5 bg-indigo-600 text-white font-bold rounded-lg hover:bg-indigo-700 transition shadow-md">
                    {{ __('messages.save') }}
                </button>
            </div>
        </form>
    </div>
@endsection
