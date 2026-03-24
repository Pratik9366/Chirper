<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title) ? $title . ' - Chirper' : 'Chirper' }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <meta property="og:image" content="{{ asset('images/og.jpeg') }}" />
    <meta property="og:title" content="Chirper" />
    <meta property="og:description" content="A demo social media platform highlighting the power and simplicity of Laravel." />
    <meta property="og:url" content="https://chirper.laravel.cloud" />

    <!-- Favicons -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon-96x96.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex flex-col bg-zinc-950 font-sans antialiased text-zinc-50">

    <!-- Navbar -->
    <header class="sticky top-0 z-50 w-full border-b border-zinc-800 bg-zinc-950/80 backdrop-blur-xl">
        <div class="container mx-auto flex h-14 items-center justify-between px-4">
            <a href="/">
                @include('svg.logo')
            </a>

            <nav class="flex items-center gap-2">
                @auth
                    <span class="text-sm text-zinc-400">{{ auth()->user()->name }}</span>
                    <form method="POST" action="/logout" class="inline">
                        @csrf
                        <button type="submit"
                            class="inline-flex items-center justify-center rounded-md text-sm font-medium h-9 px-3 text-zinc-400 hover:text-zinc-50 hover:bg-zinc-800 transition-colors">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="/login"
                        class="inline-flex items-center justify-center rounded-md text-sm font-medium h-9 px-3 text-zinc-400 hover:text-zinc-50 hover:bg-zinc-800 transition-colors">
                        Sign In
                    </a>
                    <a href="/register"
                        class="inline-flex items-center justify-center rounded-md text-sm font-medium h-9 px-4 bg-zinc-50 text-zinc-900 shadow-sm hover:bg-zinc-200 transition-colors">
                        Sign Up
                    </a>
                @endauth
            </nav>
        </div>
    </header>

    <!-- Success Toast -->
    @if (session('success'))
        <div class="fixed top-4 left-1/2 -translate-x-1/2 z-50 animate-fade-out">
            <div class="flex items-center gap-2 rounded-lg border border-zinc-800 bg-zinc-900 px-4 py-3 text-sm shadow-lg">
                <svg class="h-4 w-4 text-emerald-400 shrink-0" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="text-zinc-200">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <main class="flex-1 container mx-auto px-4 py-8">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="w-full border-t border-zinc-800 mt-24">
        <div class="mx-auto w-full max-w-350 px-4 py-8 xl:px-16">
            @include('svg.laravel-wordmark')
        </div>
    </footer>
</body>

</html>