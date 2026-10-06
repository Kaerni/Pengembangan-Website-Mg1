<x-app-layout>
    @hasSection('title')
        <x-slot name="header">
            <div>
                <p class="text-xs font-semibold uppercase tracking-wide text-emerald-700">Minimarket</p>
                <h1 class="mt-1 text-xl font-semibold text-gray-900">@yield('title')</h1>
            </div>
        </x-slot>
    @endif

    @yield('content')
</x-app-layout>