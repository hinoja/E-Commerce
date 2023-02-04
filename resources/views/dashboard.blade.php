<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <a style="list-style-type: none;text-decoration:none" href="{{ route('products.index') }}"
                            class="ml-1 underline  ">
                            <span style="color: green">Visiter la boutique!</span> 🛒 Application E-Commerce avec
                            Laravel 6
                        </a>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
