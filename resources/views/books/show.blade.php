<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $book->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($book->image)
                        <img src="{{ asset('storage/' . $book->image) }}" style="max-width: 200px; max-height: 200px;" class="mb-4">
                    @endif

                    <h1 class="text-2xl font-bold">{{ $book->title }}</h1>
                    <p class="text-gray-600 mb-2">door {{ $book->author }}</p>

                    <p><strong>Categorie:</strong> {{ $book->category }}</p>
                    <p><strong>Pagina's:</strong> {{ $book->pages }}</p>
                    <p><strong>Publicatiedatum:</strong> {{ $book->published_date }}</p>

                    <div class="mt-4">
                        <h3 class="font-bold">Beschrijving</h3>
                        <p>{{ $book->description }}</p>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('books.index') }}" class="bg-gray-500 text-white px-3 py-1 rounded">Terug</a>
                        <a href="{{ route('books.edit', $book) }}" class="bg-blue-500 text-white px-3 py-1 rounded ml-2">Bewerk</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>