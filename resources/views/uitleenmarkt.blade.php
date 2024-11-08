<head>
    @vite(['resources/js/main.js'])
</head>

<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Welkom bij de Uitleenmarkt!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        <div class="bg-white shadow-sm sm:rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">Beschikbare producten</h2>

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

                        <!-- Knop om een product te lenen, alleen als het product niet van de ingelogde gebruiker is -->
                        @if ($product->user_id != auth()->id()) <!-- De gebruiker is niet de eigenaar van het product -->
                            @if ($product->status == 'beschikbaar') <!-- Controleer of het product beschikbaar is -->
                                <form action="{{ route('product.lend', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-3 rounded">Leen dit product</button>
                                </form>
                            @else
                                <!-- Toon de einddatum als het product al is uitgeleend -->
                                <p class="text-red-500 mt-3">Dit product wordt al geleend tot {{ \Carbon\Carbon::parse($product->end_date)->format('d-m-Y') }}.</p>
                            @endif
                        @else
                            <p class="text-green-500 mt-3">Dit is jouw product. Je kunt het niet lenen.</p>
                        @endif
                    </div>
                @empty
                    <p>Er zijn geen producten beschikbaar om te lenen.</p>
                @endforelse
            </div>
        </div>
    </div>

</x-app-layout>
