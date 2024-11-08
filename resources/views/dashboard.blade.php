<head>
    @vite(['resources/js/main.js'])
</head>

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Welkom op je dashboard!") }}
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-4">Jouw producten</h2>

                <div class="space-y-4">
                    @forelse ($products as $product)
                        <div class="border p-4 rounded-lg">
                            <h3 class="text-xl font-semibold">{{ $product->name }}</h3>
                            <p><strong>Beschrijving:</strong> {{ $product->description }}</p>
                            <p><strong>Categorie:</strong> {{ $product->category }}</p>
                            <p><strong>Leentijd:</strong> {{ $product->loan_duration }} dagen</p>

                            @if ($product->image)
    <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="mt-2 w-32 h-32 object-cover">
@endif

                        </div>
                    @empty
                        <p>Je hebt nog geen producten toegevoegd.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
