<head>
    @vite(['resources/js/main.js'])
</head>

<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Welkom bij je dashboard!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        <div class="bg-white shadow-sm sm:rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">Jouw producten</h2>

            <div class="space-y-4">
                @foreach ($products as $product)
                    <div class="border p-4 rounded-lg">
                        <h3 class="text-xl font-semibold">{{ $product->name }}</h3>
                        <p><strong>Beschrijving:</strong> {{ $product->description }}</p>
                        <p><strong>Categorie:</strong> {{ $product->category }}</p>
                        <p><strong>Leentijd:</strong> {{ $product->loan_duration }} dagen</p>

                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="mt-2 w-32 h-32 object-cover">
                        @endif

                        <!-- Toon bericht als product uitgeleend is -->
                        @if ($product->borrower_id != NULL)
                            <p class="text-red-500 mt-3">
                                Dit product is uitgeleend tot {{ \Carbon\Carbon::parse($product->end_date)->format('d-m-Y') }}.
                            </p>
                        @endif

                        <!-- Knop om de teruggave van het product door de lener te bevestigen -->
                        @if ($product->user_id == auth()->id() && $product->status == 'teruggegeven_lener')
                            <form action="{{ route('product.bevestig-teruggeven', $product->id) }}" method="POST" class="mt-4">
                                @csrf
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                                    Bevestig teruggegeven
                                </button>
                            </form>
                        @elseif ($product->user_id == auth()->id() && $product->borrower_id == NULL)
                            <!-- De uitlener kan het product verwijderen als het niet uitgeleend is -->
                            <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="mt-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700" onclick="return confirm('Weet je zeker dat je dit product wilt verwijderen?')">
                                    Verwijder
                                </button>
                            </form>
                        @endif

                    </div>
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>
