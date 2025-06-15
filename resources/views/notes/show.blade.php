<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Notes
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex">
                <x-link-button href="{{ route('notes.edit', $note) }}" class="ml-auto">Edit</x-link-button>
                <form method="post">
                    @csrf
                    @method('DELETE')
                    <x-primary-button href="{{ route('notes.destroy', $note) }}" class="ml-2 bg-red-500  bg-red-500 hover:bg-red-600 focus:bg-red-600 mouse active:bg-red-600 focus:outline-offset-2 focus:outline-red-500">Delete</x-primary-button>
                </form>
            </div>
            <p class="mt-4 whitespace-pre-wrap">Updated at: {{ $note->updated_at->diffForHumans() }}</p>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10">
                <h1 class="text-bold text-4xl">{{ $note->title }}</h1>
                <p class="mt-4">{{ $note->text }}</p>  
                <p class="mt-4">Author: {{ $note->user->name }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
