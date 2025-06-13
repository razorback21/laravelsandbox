<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Notebook
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10">
                <h1 class="text-bold text-4xl">{{ $notebook->name }}</h1>
                <p class="mt-4 whitespace-pre-wrap">Updated at: {{ $notebook->updated_at->diffForHumans() }}</p>
                <p class="mt-3">
                    <a href="{{ route('notebooks.edit', $notebook) }}" class="text-blue-500 hover:underline">Edit</a>
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
