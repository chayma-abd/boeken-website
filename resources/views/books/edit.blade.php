<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Boek Bewerken
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label class="block font-bold">Titel</label>
                            <input type="text" name="title" value="{{ $book->title }}" class="w-full border rounded p-2" required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold">Auteur</label>
                            <input type="text" name="author" value="{{ $book->author }}" class="w-full border rounded p-2" required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold">Categorie</label>
                            <input type="text" name="category" value="{{ $book->category }}" class="w-full border rounded p-2" required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold">Pagina's</label>
                            <input type="number" name="pages" value="{{ $book->pages }}" class="w-full border rounded p-2" required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold">Publicatiedatum</label>
                            <input type="date" name="published_date" value="{{ $book->published_date }}" class="w-full border rounded p-2" required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold">Beschrijving</label>
                            <textarea name="description" rows="5" class="w-full border rounded p-2" required>{{ $book->description }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold">Afbeelding</label>
                            <input type="file" name="image" class="w-full border rounded p-2">
                            @if($book->image)
                                <p class="text-sm mt-1">Huidige afbeelding: {{ $book->image }}</p>
                            @endif
                        </div>

                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Bijwerken</button>
                        <a href="{{ route('books.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded ml-2">Annuleren</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>