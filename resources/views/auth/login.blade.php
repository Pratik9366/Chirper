<x-layout>
    <x-slot:title>Sign In</x-slot:title>

    <div class="flex min-h-[calc(100vh-16rem)] items-center justify-center">
        <div class="w-full max-w-sm">
            <div class="rounded-xl border border-zinc-800 bg-zinc-900 shadow-sm">
                <div class="p-6">
                    <h1 class="text-xl font-semibold tracking-tight text-center text-zinc-50 mb-1">Welcome Back</h1>
                    <p class="text-sm text-zinc-400 text-center mb-6">Sign in to your account</p>

                    <form method="POST" action="/login">
                        @csrf

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-zinc-200 mb-2">Email</label>
                            <input type="email" id="email" name="email" placeholder="mail@example.com"
                                value="{{ old('email') }}"
                                class="flex h-10 w-full rounded-md border border-zinc-700 bg-zinc-950 px-3 py-2 text-sm text-zinc-50 placeholder:text-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 focus:ring-offset-2 focus:ring-offset-zinc-950 @error('email') border-red-500 @enderror"
                                required autofocus>
                            @error('email')
                                <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-zinc-200 mb-2">Password</label>
                            <input type="password" id="password" name="password" placeholder="••••••••"
                                class="flex h-10 w-full rounded-md border border-zinc-700 bg-zinc-950 px-3 py-2 text-sm text-zinc-50 placeholder:text-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 focus:ring-offset-2 focus:ring-offset-zinc-950 @error('password') border-red-500 @enderror"
                                required>
                            @error('password')
                                <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center gap-2 mt-4">
                            <input type="checkbox" id="remember" name="remember"
                                class="h-4 w-4 rounded border-zinc-700 bg-zinc-950 text-zinc-50 focus:ring-zinc-400 accent-zinc-50">
                            <label for="remember" class="text-sm text-zinc-400 cursor-pointer">Remember me</label>
                        </div>

                        <!-- Submit -->
                        <button type="submit"
                            class="mt-6 w-full inline-flex items-center justify-center rounded-md bg-zinc-50 text-zinc-900 text-sm font-medium h-10 px-4 shadow-sm hover:bg-zinc-200 transition-colors">
                            Sign In
                        </button>
                    </form>
                </div>

                <div class="border-t border-zinc-800 px-6 py-4">
                    <p class="text-center text-sm text-zinc-400">
                        Don't have an account?
                        <a href="/register" class="font-medium text-zinc-50 hover:underline">Register</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layout>