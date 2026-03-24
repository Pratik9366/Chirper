<x-layout>
    <x-slot:title>Edit Chirp</x-slot:title>

    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mt-8 text-zinc-50">Edit Chirp</h1>

        <div class="rounded-xl border border-zinc-800 bg-zinc-900 shadow-sm mt-8">
            <div class="p-6">
                <form method="POST" action="/chirps/{{ $chirp->id }}">
                    @csrf
                    @method('PUT')

                    <div>
                        <textarea name="message"
                            class="flex min-h-[100px] w-full rounded-md border border-zinc-700 bg-zinc-950 px-3 py-2 text-sm text-zinc-50 placeholder:text-zinc-500 focus:outline-none focus:ring-2 focus:ring-zinc-400 focus:ring-offset-2 focus:ring-offset-zinc-950 resize-none @error('message') border-red-500 @enderror"
                            rows="4" maxlength="255" required>{{ old('message', $chirp->message) }}</textarea>

                        @error('message')
                            <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <a href="/"
                            class="inline-flex items-center justify-center rounded-md text-sm font-medium h-9 px-4 border border-zinc-700 text-zinc-300 hover:bg-zinc-800 hover:text-zinc-50 transition-colors">
                            Cancel
                        </a>
                        <button type="submit"
                            class="inline-flex items-center justify-center rounded-md bg-zinc-50 text-zinc-900 text-sm font-medium h-9 px-4 shadow-sm hover:bg-zinc-200 transition-colors">
                            Update Chirp
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>