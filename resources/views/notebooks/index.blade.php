<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Notes
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
            <x-link-button href="{{ route('notebooks.create') }}">
                + NEW NOTEBOOK
            </x-link-button>
            @forelse ($notebooks as $notebook)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white overflow-hidden sm:rounded-lg px-5 py-3 flex items-center justify-between">
                    <h2 class="font-bold text-indigo-600">
                        <a href="{{ route('notebooks.notes', $notebook) }}" class="hover:underline">{{ $notebook->name }}</a>    
                    </h2>

                    <x-link-button href="{{ route('notebooks.edit', $notebook) }}" class="ml-auto mr-2">
                        EDIT
                    </x-link-button>
                    <form action="{{ route('notebooks.destroy', $notebook) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-primary-button onclick="return confirm('Are you sure you want to delete this notebook?')" class="bg-red-500  bg-red-500 hover:bg-red-600 focus:bg-red-600 active:bg-red-600 focus:outline-offset-2 focus:outline-red-500">
                            DELETE
                        </x-primary-button>
                    </form>                  
                    
                </div>                   
            </div>
            
            @empty
              <p>You have no notebooks yet.</p>  
            @endforelse

            @if ($notebooks->hasPages())
                <div class="mt-4">
                    {{ $notebooks->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>