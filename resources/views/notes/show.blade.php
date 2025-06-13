<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Notes
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10">
                <h1 class="text-bold">{{ $note->name }}</h1>
                <p class="mt-3">{{ $note->text }}</p>
                <p class="mt-4 whitespace-pre-wrap">Updated at: {{ $note->updated_at->diffForHumans() }}</p>
                <p class="mt-3">
                    <a href="{{ route('notes.edit', $note) }}" class="text-blue-500 hover:underline">Edit</a>
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
