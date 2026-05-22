<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Veelgestelde Vragen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    @foreach($categories as $category)
                        <div class="mb-6">
                            <h3 class="text-xl font-bold text-blue-800 mb-3">{{ $category->name }}</h3>
                            <div class="space-y-3">
                                @foreach($category->faqItems as $item)
                                    <div class="border rounded p-4 bg-gray-50">
                                        <p class="font-bold text-gray-800">❓ {{ $item->question }}</p>
                                        <p class="text-gray-700 mt-2">📖 {{ $item->answer }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>