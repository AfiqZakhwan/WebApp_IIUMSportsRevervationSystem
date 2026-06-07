<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — IIUM Sports</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">

<div class="flex min-h-screen">
    {{-- Sidebar --}}
    <aside class="w-64 bg-emerald-900 text-white flex flex-col shrink-0">
        <div class="p-6 border-b border-emerald-700">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/IIUM_emblem.png') }}" class="h-10 w-auto" alt="IIUM">
                <div>
                    <p class="font-bold text-sm leading-tight">IIUM Sports</p>
                    <p class="text-xs text-emerald-300">Admin Panel</p>
                </div>
            </div>
        </div>

        <nav class="flex-1 p-4 space-y-1">
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition
                      {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-700 text-white' : 'text-emerald-100 hover:bg-emerald-800' }}">
                📊 Dashboard
            </a>
            <a href="{{ route('admin.venues.index') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition
                      {{ request()->routeIs('admin.venues*') ? 'bg-emerald-700 text-white' : 'text-emerald-100 hover:bg-emerald-800' }}">
                🏟️ Venues
            </a>
            <a href="{{ route('admin.equipment.index') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition
                      {{ request()->routeIs('admin.equipment*') ? 'bg-emerald-700 text-white' : 'text-emerald-100 hover:bg-emerald-800' }}">
                🎽 Equipment
            </a>
            <a href="{{ route('admin.bookings.index') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition
                      {{ request()->routeIs('admin.bookings*') ? 'bg-emerald-700 text-white' : 'text-emerald-100 hover:bg-emerald-800' }}">
                📅 Bookings
            </a>
            <a href="{{ route('admin.users.index') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition
                      {{ request()->routeIs('admin.users*') ? 'bg-emerald-700 text-white' : 'text-emerald-100 hover:bg-emerald-800' }}">
                👥 Users
            </a>
        </nav>

        <div class="p-4 border-t border-emerald-700">
            <a href="{{ route('dashboard') }}" class="block text-xs text-emerald-300 hover:text-white mb-2">← Student View</a>
            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf
                <button @click.prevent="$root.submit()" class="text-xs text-emerald-300 hover:text-white">Log Out</button>
            </form>
        </div>
    </aside>

    {{-- Main Content --}}
    <main class="flex-1 overflow-auto">
        {{-- Top bar --}}
        <div class="bg-white border-b border-gray-200 px-8 py-4 flex items-center justify-between">
            <h1 class="text-lg font-semibold text-gray-800">@yield('page-title', 'Admin')</h1>
            <span class="text-sm text-gray-500">{{ Auth::user()->name }} &bull; Admin</span>
        </div>

        <div class="p-8">
            @if(session('success'))
                <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-lg px-4 py-3 text-sm">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="mb-6 bg-red-50 border border-red-200 text-red-800 rounded-lg px-4 py-3 text-sm">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </div>
    </main>
</div>

</body>
</html>
