<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contacteer Ons') }}
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

                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label class="block font-bold mb-1">Naam</label>
                            <input type="text" name="name" class="w-full border rounded p-2" required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold mb-1">Email</label>
                            <input type="email" name="email" class="w-full border rounded p-2" required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold mb-1">Onderwerp</label>
                            <input type="text" name="subject" class="w-full border rounded p-2" required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold mb-1">Bericht</label>
                            <textarea name="message" rows="5" class="w-full border rounded p-2" required></textarea>
                        </div>

                        <button type="submit" style="background-color: #3b82f6; color: white; padding: 8px 20px; border-radius: 6px; border: none; cursor: pointer;">Verstuur Bericht</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>