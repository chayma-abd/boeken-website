<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Boeken Overzicht') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">Alle Boeken</h1>
                    
                    <a href="{{ route('books.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Nieuw Boek Toevoegen</a>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        @foreach($books as $book)
                            <div class="border rounded p-4">
                                <h3 class="text-xl font-bold">{{ $book->title }}</h3>
                                <p><strong>Auteur:</strong> {{ $book->author }}</p>
                                <p><strong>Categorie:</strong> {{ $book->category }}</p>
                                <p><strong>Pagina's:</strong> {{ $book->pages }}</p>
                                <a href="{{ route('books.show', $book) }}" class="text-blue-500">Bekijk</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>