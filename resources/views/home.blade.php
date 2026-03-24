<x-layout>
    <x-slot:title>Home Feed</x-slot:title>

    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mt-8 text-zinc-50">Latest Chirps</h1>

        <!-- Chirp Form -->
        <div class="rounded-xl border border-zinc-800 bg-zinc-900 shadow-sm mt-8">
            <div class="p-6">
                <form method="POST" action="/chirps">
                    @csrf
                    <div>
                        <textarea name="message" placeholder="What's on your mind?"
                            class="flex min-h-[100px] w-full rounded-md border border-zinc-700 bg-zinc-950 px-3 py-2 text-sm text-zinc-50 placeholder:text-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 focus:ring-offset-2 focus:ring-offset-zinc-950 resize-none @error('message') border-red-500 @enderror"
                            rows="4" maxlength="255" required>{{ old('message') }}</textarea>

                        @error('message')
                            <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-4 flex items-center justify-end">
                        <button type="submit"
                            class="inline-flex items-center justify-center rounded-md bg-zinc-50 text-zinc-900 text-sm font-medium h-9 px-4 shadow-sm hover:bg-zinc-200 transition-colors">
                            Chirp
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Feed -->
        <div class="space-y-4 mt-8">
            @forelse ($chirps as $chirp)
                <x-chirp :chirp="$chirp" />
            @empty
                <div class="flex flex-col items-center justify-center py-16">
                    <svg class="h-12 w-12 text-zinc-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                        </path>
                    </svg>
                    <p class="mt-4 text-sm text-zinc-500">No chirps yet. Be the first to chirp!</p>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>