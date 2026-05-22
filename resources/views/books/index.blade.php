<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Boeken Overzicht
        </h2>
    </x-slot>

    <div class="py-12" style="background-color: #f3f4f6;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="p-6">

                    <div style="margin-bottom: 20px;">
                        <a href="{{ route('books.create') }}" style="background-color: #3b82f6; color: white; padding: 10px 18px; border-radius: 8px; display: inline-block; text-decoration: none; font-weight: bold;">+ Nieuw Boek Toevoegen</a>
                    </div>

                    @foreach($books as $book)
                        <div style="background-color: white; border: 1px solid #e5e7eb; padding: 16px; margin-bottom: 16px; border-radius: 8px; box-shadow: 0 1px 2px rgba(0,0,0,0.05);">
                            <div style="display: flex; gap: 16px;">
                                @if($book->image)
                                    <img src="{{ asset('storage/' . $book->image) }}" style="width: 80px; height: 110px; object-fit: cover; border-radius: 6px;">
                                @endif
                                <div>
                                    <h3 style="font-size: 20px; font-weight: bold; color: #1f2937;">{{ $book->title }}</h3>
                                    <p style="color: #4b5563;"><strong>Auteur:</strong> {{ $book->author }}</p>
                                    <p style="color: #4b5563;"><strong>Categorie:</strong> {{ $book->category }}</p>
                                    <p style="color: #4b5563;"><strong>Pagina's:</strong> {{ $book->pages }}</p>
                                    <div style="margin-top: 12px; display: flex; gap: 8px;">
                                        <a href="{{ route('books.show', $book) }}" style="background-color: #3b82f6; color: white; padding: 5px 12px; border-radius: 6px; text-decoration: none; display: inline-block;">Bekijk</a>
                                        <a href="{{ route('books.edit', $book) }}" style="background-color: #3b82f6; color: white; padding: 5px 12px; border-radius: 6px; text-decoration: none; display: inline-block;">Bewerk</a>
                                        <form action="{{ route('books.destroy', $book) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="background-color: #3b82f6; color: white; padding: 5px 12px; border-radius: 6px; border: none; cursor: pointer;" onclick="return confirm('Verwijderen?')">Verwijder</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>