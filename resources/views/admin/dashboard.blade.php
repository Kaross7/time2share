<head>
    @vite(['resources/js/main.js'])
</head>

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-semibold">Admin Dashboard</h2>
                    <p class="mt-4">Welkom bij het beheer van de applicatie.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Gebruikerslijst -->
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        <div class="bg-white shadow-sm sm:rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">Gebruikers</h2>

            <div class="space-y-4">
                @foreach ($users as $user)
                    <div class="border p-4 rounded-lg">
                        <h3 class="text-xl font-semibold">{{ $user->name }}</h3>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Status:</strong> {{ $user->is_blocked ? 'Geblokkeerd' : 'Actief' }}</p>

                        <div class="mt-4">
                            @if ($user->is_blocked)
                                <!-- Deblokkeer link -->
                                <form action="{{ route('admin.unblock', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                                        Deblokkeer
                                    </button>
                                </form>
                            @else
                                <!-- Blokkeer link -->
                                <form action="{{ route('admin.block', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">
                                        Blokkeer
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Productenlijst -->
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        <div class="bg-white shadow-sm sm:rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">Producten</h2>

            <div class="space-y-4">
                @foreach ($products as $product)
                    <div class="border p-4 rounded-lg">
                        <h3 class="text-xl font-semibold">{{ $product->name }}</h3>
                        <p><strong>Eigenaar:</strong> {{ $product->user->name }}</p>
                        <p><strong>Categorie:</strong> {{ $product->category }}</p>
                        <p><strong>Leentijd:</strong> {{ $product->loan_duration }} dagen</p>

                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="mt-2 w-32 h-32 object-cover">
                        @endif

                        <!-- Verwijder product knop -->
                        <form action="{{ route('admin.deleteProduct', $product->id) }}" method="POST" class="mt-4">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700" onclick="return confirm('Weet je zeker dat je dit product wilt verwijderen?')">
                                Verwijder
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>
