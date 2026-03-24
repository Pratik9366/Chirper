@props(['chirp'])

<div class="rounded-xl border border-zinc-800 bg-zinc-900 shadow-sm">
    <div class="p-6">
        <div class="flex gap-3">
            <div class="shrink-0">
                <img src="https://avatars.laravel.cloud/{{ urlencode($chirp->user->email) }}?vibe=ocean"
                    alt="{{ $chirp->user->name }}'s avatar" class="h-10 w-10 rounded-full ring-2 ring-zinc-700" />
            </div>

            <div class="flex-1 min-w-0">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-1.5">
                        <p class="text-sm font-semibold text-zinc-50">{{ $chirp->user->name }}</p>
                        <span class="text-zinc-600">·</span>
                        <p class="text-sm text-zinc-400">{{ $chirp->created_at->diffForHumans() }}</p>
                        @if ($chirp->updated_at->gt($chirp->created_at->addSeconds(5)))
                            <span class="text-zinc-600">·</span>
                            <span class="text-sm text-zinc-500 italic">edited</span>
                        @endif
                    </div>

                    @if (auth()->check() && auth()->id() === $chirp->user_id)
                        <div class="flex gap-1">
                            <a href="/chirps/{{ $chirp->id }}/edit"
                                class="inline-flex items-center justify-center rounded-md text-sm font-medium h-8 px-3 text-zinc-400 hover:text-zinc-50 hover:bg-zinc-800 transition-colors">
                                Edit
                            </a>
                            <form method="POST" action="/chirps/{{ $chirp->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this chirp?')"
                                    class="inline-flex items-center justify-center rounded-md text-sm font-medium h-8 px-3 text-red-400 hover:bg-red-950 transition-colors">
                                    Delete
                                </button>
                            </form>
                        </div>
                    @endif
                </div>

                <p class="mt-2 text-sm text-zinc-300">{{ $chirp->message }}</p>
            </div>
        </div>
    </div>
</div>