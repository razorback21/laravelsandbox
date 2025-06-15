<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Notebook
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
            <div class="flex">
                <x-link-button href="{{ route('notebooks.edit', $notebook) }}" class="ml-auto">Edit</x-link-button>
                <form method="post">
                    @csrf
                    @method('DELETE')
                    <x-primary-button onclick="return confirm('Are you sure you want to delete this notebook?')"  href="{{ route('notebooks.destroy', $notebook) }}" class="ml-2  bg-red-500  bg-red-500 hover:bg-red-600 focus:bg-red-600 mouse active:bg-red-600 focus:outline-offset-2 focus:outline-red-500">Delete</x-primary-button>
                </form>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10">
                <h1 class="text-bold text-4xl">{{ $notebook->name }}</h1>
                <p class="mt-4 whitespace-pre-wrap">Author: {{ $notebook->user->name }} - Updated at: {{ $notebook->updated_at->diffForHumans() }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
