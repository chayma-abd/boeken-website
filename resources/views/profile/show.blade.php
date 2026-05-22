<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mijn Profiel') }}
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

                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block font-bold mb-1">Naam</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border rounded p-2" required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold mb-1">Gebruikersnaam</label>
                            <input type="text" name="username" value="{{ old('username', $user->username) }}" class="w-full border rounded p-2">
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold mb-1">Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border rounded p-2" required>
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold mb-1">Verjaardag</label>
                            <input type="date" name="birthday" value="{{ old('birthday', $user->birthday) }}" class="w-full border rounded p-2">
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold mb-1">Over mij</label>
                            <textarea name="bio" rows="4" class="w-full border rounded p-2">{{ old('bio', $user->bio) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold mb-1">Profielfoto</label>
                            @if($user->profile_photo)
                                <img src="{{ asset('storage/' . $user->profile_photo) }}" style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;" class="mb-2">
                            @endif
                            <input type="file" name="profile_photo" class="w-full border rounded p-2">
                        </div>

                        <button type="submit" style="background-color: #3b82f6; color: white; padding: 8px 20px; border-radius: 6px; border: none; cursor: pointer;">Profiel Bijwerken</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>