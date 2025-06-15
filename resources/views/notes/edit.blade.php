<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Notes
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10">
                <form action="{{ route('notes.update', $note) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                        <x-input-label class="text-bold mb-2">Notebook</x-input-label>
                        <select name="notebook_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <option value="">--- Select Notebook ---</option>
                            @foreach (Auth::user()->notebooks as $notebook)
                            <option value="{{ $notebook->id }}" @if($note->notebook_id === $notebook->id) selected @endif>{{ $notebook->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-6">
                        <x-input-label class="text-bold mb-2">Title</x-input-label>
                        <x-text-input name="title" class="w-full" value="{{ @old('title', $note->title) }}"></x-text-input>
                        @error('title')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <x-input-label class="text-bold mb-2">Text</x-input-label>
                        <x-text-textarea name="text" class="w-full" rows="10" placeholder="Add you note" value="{{ @old('text', $note->text) }}"></x-text-textarea>
                        @error('text')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="flex items-center justify-between"></div>
                    <x-primary-button>Save Note</x-primary-button>               
                  </form>            
            </div>
           
        </div>
    </div>
</x-app-layout>
