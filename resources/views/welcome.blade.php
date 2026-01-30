@extends('layouts.base')

@section('contenido')
    <div class="relative bg-white overflow-hidden min-h-screen flex items-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">

                <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                    <div class="sm:text-center lg:text-left">
                        {{-- Título Principal con clave de traducción --}}
                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                            <span class="block xl:inline">{{ __('messages.welcome') }}</span>
                            <span class="block text-indigo-600 xl:inline">Instituto Akram</span>
                        </h1>

                        <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            {{ App::getLocale() == 'es'
                                ? 'Gestiona tus alumnos de forma eficiente, rápida y segura. Todo en un solo lugar.'
                                : (App::getLocale() == 'fr'
                                    ? 'Gérez vos étudiants de manière efficace, rapide et sécurisée.'
                                    : 'Manage your students efficiently, quickly and safely.')
                            }}
                        </p>

                        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start gap-4">
                            @if (Route::has('login'))
                                @auth
                                    {{-- Si está autenticado: Ir al Dashboard --}}
                                    <a href="{{ url('/dashboard') }}" class="flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10 shadow-lg transition">
                                        {{ __('messages.dashboard') }}
                                    </a>
                                @else
                                    {{-- Si NO está autenticado: Login y Register --}}
                                    <a href="{{ route('login') }}" class="flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10 shadow-lg transition">
                                        {{ App::getLocale() == 'es' ? 'Iniciar Sesión' : (App::getLocale() == 'fr' ? 'Connexion' : 'Login') }}
                                    </a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 md:py-4 md:text-lg md:px-10 transition">
                                            {{ App::getLocale() == 'es' ? 'Registrarse' : (App::getLocale() == 'fr' ? 'S\'inscrire' : 'Register') }}
                                        </a>
                                    @endif
                                @endauth
                            @endif
                        </div>
                    </div>
                </main>
            </div>
        </div>

        {{-- Imagen decorativa para el Hero --}}
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1471&q=80" alt="Students">
        </div>
    </div>
@endsection
