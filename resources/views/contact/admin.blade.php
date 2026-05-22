<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact Berichten') }}
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

                    @foreach($contacts as $contact)
                        <div class="border rounded p-4 mb-4 {{ $contact->is_read ? 'bg-gray-50' : 'bg-blue-50' }}">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p><strong>Naam:</strong> {{ $contact->name }}</p>
                                    <p><strong>Email:</strong> {{ $contact->email }}</p>
                                    <p><strong>Onderwerp:</strong> {{ $contact->subject }}</p>
                                    <p><strong>Bericht:</strong></p>
                                    <p class="ml-4">{{ $contact->message }}</p>
                                    <p class="text-sm text-gray-500 mt-2">Ontvangen: {{ $contact->created_at->format('d-m-Y H:i') }}</p>
                                </div>
                                <div class="flex gap-2">
                                    @if(!$contact->is_read)
                                        <form action="{{ route('contact.markRead', $contact) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" style="background-color: #3b82f6; color: white; padding: 4px 12px; border-radius: 6px; border: none; cursor: pointer;">Markeer als gelezen</button>
                                        </form>
                                    @endif
                                    <form action="{{ route('contact.destroy', $contact) }}" method="POST" onsubmit="return confirm('Verwijder dit bericht?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background-color: #ef4444; color: white; padding: 4px 12px; border-radius: 6px; border: none; cursor: pointer;">Verwijder</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @if($contacts->isEmpty())
                        <p class="text-gray-500">Geen contact berichten gevonden.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>