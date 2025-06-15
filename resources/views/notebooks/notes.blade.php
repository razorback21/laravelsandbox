<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $notebook->name }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @forelse ($notes as $note)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white overflow-hidden sm:rounded-lg p-10">
                    <h2 class="font-bold text-2xl text-indigo-600">
                        <a href="{{ route('notes.show', $note) }}" class="hover:underline">{{ $note->title }}</a>
                        @if ($note->notebook)
                            <span class="inline-block text-sm text-gray-400">{{ $note->notebook->name }}</span>
                        @endif
                    </h2>
                    <p class="mt-2">{{ Str::limit($note->text,200, '...') }}</p>
                    <p class="mt-2">{{ $note->updated_at->diffForHumans() }}</p>
                </div>                   
            </div>
            
            @empty
              <p>You have no notes yet.</p>  
            @endforelse

            @if ($notes->hasPages())
                <div class="mt-4">
                    {{ $notes->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>