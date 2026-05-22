<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('FAQ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Alleen Nieuwe Vraag -->
                    <div class="border rounded p-4 mb-6">
                        <h3 class="font-bold text-lg mb-3">Nieuwe Vraag Toevoegen</h3>
                        <form action="{{ route('faq.storeItem') }}" method="POST">
                            @csrf
                            <select name="category_id" class="w-full border rounded p-2 mb-2" required>
                                <option value="">Kies categorie</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <input type="text" name="question" placeholder="Vraag" class="w-full border rounded p-2 mb-2" required>
                            <textarea name="answer" placeholder="Antwoord" rows="3" class="w-full border rounded p-2 mb-2" required></textarea>
                            <button type="submit" style="background-color: #3b82f6; color: white; padding: 8px 16px; border-radius: 6px; border: none; cursor: pointer;">+ Vraag Toevoegen</button>
                        </form>
                    </div>

                    <!-- Bestaande Vragen -->
                    <div class="mt-6">
                        <h3 class="font-bold text-lg mb-3">Bestaande Vragen</h3>
                        @foreach($categories as $category)
                            <div class="border rounded p-4 mb-4">
                                <h4 class="font-bold text-blue-800 mb-2">{{ $category->name }}</h4>
                                @foreach($faqItems->where('category_id', $category->id) as $item)
                                    <div class="ml-4 mt-2 p-2 bg-gray-50 rounded flex justify-between items-center">
                                        <div>
                                            <p><strong>Vraag:</strong> {{ $item->question }}</p>
                                            <p class="text-sm"><strong>Antwoord:</strong> {{ $item->answer }}</p>
                                        </div>
                                        <form action="{{ route('faq.destroyItem', $item) }}" method="POST" onsubmit="return confirm('Verwijder deze vraag?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="background-color: #ef4444; color: white; padding: 4px 12px; border-radius: 6px; border: none; cursor: pointer;">Verwijder</button>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>