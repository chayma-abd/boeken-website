<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nieuw Boek Toevoegen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold">Titel</label>
                            <input type="text" name="title" class="w-full border rounded p-2" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold">Auteur</label>
                            <input type="text" name="author" class="w-full border rounded p-2" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold">Categorie</label>
                            <input type="text" name="category" class="w-full border rounded p-2" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold">Pagina's</label>
                            <input type="number" name="pages" class="w-full border rounded p-2" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold">Publicatiedatum</label>
                            <input type="date" name="published_date" class="w-full border rounded p-2" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold">Beschrijving</label>
                            <textarea name="description" rows="5" class="w-full border rounded p-2" required></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold">Afbeelding</label>
                            <input type="file" name="image" class="w-full border rounded p-2">
                        </div>

                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded" style="background-color: #3b82f6; color: white;">📚 Opslaan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>