@extends('layouts.base')

@section('contenido')
    <div class="min-h-screen flex flex-col bg-gray-50">
        <nav class="bg-white shadow-sm border-b">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-20 items-center">
                    <div class="flex items-center">
                        <span class="text-xl font-bold text-indigo-600">Instituto Dashboard</span>
                    </div>

                    <div class="flex flex-col items-end pt-2">
                        <div class="flex items-center space-x-4 mb-1">
                            <span class="text-gray-600 text-sm italic">{{ __('messages.welcome') }}, {{ Auth::user()->name }}</span>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-sm font-semibold text-red-500 hover:text-red-700 transition">
                                    {{ __('messages.logout') }}
                                </button>
                            </form>
                        </div>

                        <div class="relative group pb-2">
                            <button class="flex items-center space-x-2 bg-white px-3 py-1.5 rounded-lg border border-gray-200 group-hover:border-indigo-300 transition shadow-sm">
                                @php
                                    $locale = App::getLocale();
                                    $flags = ['es' => 'es', 'en' => 'gb', 'fr' => 'fr'];
                                    $flagCode = $flags[$locale] ?? 'es';
                                @endphp
                                <img src="https://flagcdn.com/w40/{{ $flagCode }}.png" width="20" height="20" class="rounded-full object-cover shadow-sm">
                                <span class="text-[10px] font-bold text-gray-700 uppercase">{{ $locale }}</span>
                                <svg class="w-3 h-3 text-gray-400 group-hover:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>

                            <div class="absolute right-0 top-full w-44 bg-white rounded-xl shadow-xl border border-gray-100 hidden group-hover:block z-50 animate-in fade-in zoom-in duration-200">
                                <div class="p-1">
                                    <a href="{{ url('lang/es') }}" class="flex items-center space-x-3 px-3 py-2 text-sm text-gray-700 hover:bg-indigo-50 rounded-lg transition">
                                        <img src="https://flagcdn.com/w40/es.png" width="20" height="20" class="rounded-full object-cover">
                                        <span class="{{ App::getLocale() == 'es' ? 'font-bold text-indigo-600' : '' }}">Español</span>
                                    </a>
                                    <a href="{{ url('lang/en') }}" class="flex items-center space-x-3 px-3 py-2 text-sm text-gray-700 hover:bg-indigo-50 rounded-lg transition">
                                        <img src="https://flagcdn.com/w40/gb.png" width="20" height="20" class="rounded-full object-cover">
                                        <span class="{{ App::getLocale() == 'en' ? 'font-bold text-indigo-600' : '' }}">English</span>
                                    </a>
                                    <a href="{{ url('lang/fr') }}" class="flex items-center space-x-3 px-3 py-2 text-sm text-gray-700 hover:bg-indigo-50 rounded-lg transition">
                                        <img src="https://flagcdn.com/w40/fr.png" width="20" height="20" class="rounded-full object-cover">
                                        <span class="{{ App::getLocale() == 'fr' ? 'font-bold text-indigo-600' : '' }}">Français</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div class="flex-grow max-w-7xl mx-auto py-12 px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-extrabold text-gray-900 tracking-tight">{{ __('messages.dashboard') }}</h2>
            </div>

            <div class="flex justify-center">
                <div class="max-w-md w-full bg-white shadow-2xl rounded-3xl border border-indigo-50 p-10 text-center hover:scale-105 transition-transform duration-300">
                    <div class="w-24 h-24 bg-indigo-50 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="h-12 w-12 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-extrabold text-gray-800">{{ __('messages.students_mgmt') }}</h3>
                    <a href="{{ url('/alumno') }}" class="mt-8 inline-flex items-center justify-center w-full px-8 py-4 bg-indigo-600 text-white text-lg font-bold rounded-2xl hover:bg-indigo-700 shadow-lg">
                        {{ __('messages.students_mgmt') }}
                    </a>
                </div>
            </div>
        </div>

        <footer class="bg-white border-t border-gray-200 py-6 mt-auto">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <p class="text-sm text-gray-500">
                    &copy; {{ date('Y') }} Instituto Dashboard. Todos los derechos reservados.
                </p>
            </div>
        </footer>
    </div>
@endsection
