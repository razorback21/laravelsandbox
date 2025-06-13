<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Notes
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
            @endif
            <x-link-button href="{{ route('notes.create') }}">
                + NEW NOTE
            </x-link-button>
            @forelse ($notes as $note)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white overflow-hidden sm:rounded-lg p-10">
                    <h2 class="font-bold text-2xl text-indigo-600">
                        <a href="{{ route('notes.show', $note) }}" class="hover:underline">{{ $note->title }}</a>
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