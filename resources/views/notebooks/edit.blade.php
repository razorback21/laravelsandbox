<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Notebook
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10">
                <form action="{{ route('notebooks.update', $notebook) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-6">
                        <x-input-label class="text-bold mb-2" >Name</x-input-label>
                        <x-text-input name="name" class="w-full" value="{{ $notebook->name }}"></x-text-input>
                        @error('name')
                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex items-center justify-between"></div>
                    <x-primary-button>Save Notebook</x-primary-button>               
                  </form>            
            </div>
           
        </div>
    </div>
</x-app-layout>
