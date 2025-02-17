<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>

                <!-- Botão para ir para a página Welcome -->
                <div class="mt-4 flex justify-center">
                    <a href="{{ url('/welcome') }}" 
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-2xl py-4 px-8 rounded-lg shadow-lg transition duration-300">
                        Ir para a Página Inicial
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
