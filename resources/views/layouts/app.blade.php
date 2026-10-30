<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- each page can set its own title, default is Bakuna Tracker --}}
    <title>@yield('title', 'Bakuna Tracker')</title>
    {{-- loads Tailwind css and js through Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col bg-slate-100 text-slate-800">
    {{-- top nav --}}
    <nav class="bg-emerald-700 text-white">
        <div class="max-w-5xl mx-auto px-4 py-3 flex flex-wrap items-center justify-between gap-2">
            <a href="/dashboard" class="font-bold text-lg">Bakuna Tracker</a>
            <div class="flex flex-wrap items-center gap-4 text-sm">
                {{-- shown only when logged in --}}
                @auth
                    <a href="{{ route('dashboard') }}" class="hover:underline">Dashboard</a>
                    <a href="{{ route('schedule') }}" class="hover:underline">Schedule</a>
                    <span>Hi, {{ auth()->user()->name }}</span>
                    {{-- logout must be a POST form --}}
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button class="underline">Logout</button>
                    </form>
                @endauth
                {{-- shown only to guests --}}
                @guest
                    <a href="{{ route('login') }}" class="underline">Sign in</a>
                @endguest
            </div>
        </div>
    </nav>

    {{-- the page content goes here --}}
    <main class="flex-1 max-w-5xl w-full mx-auto px-4 py-6 lg:py-10">
        @yield('content')
    </main>

    {{-- footer --}}
    <footer class="bg-slate-800 text-slate-300 text-sm text-center py-4 px-4">
        Davao City &middot; Nurse Marites Abellana
    </footer>
</body>
</html>
