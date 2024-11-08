<head>
    @vite(['resources/js/main.js'])
</head>

<x-app-layout>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-4">Voeg een nieuw product toe</h2>

                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="product_name" class="block text-sm font-medium text-gray-700">Wat is het product?</label>
                        <input type="text" id="product_name" name="product_name" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                    </div>

                    <div class="mb-4">
                        <label for="product_image" class="block text-sm font-medium text-gray-700">Voeg een foto toe van het product</label>
                        <input type="file" id="product_image" name="product_image" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                    </div>

                    <div class="mb-4">
                        <label for="product_description" class="block text-sm font-medium text-gray-700">Geef een beschrijving van dit product</label>
                        <textarea id="product_description" name="product_description" rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="product_category" class="block text-sm font-medium text-gray-700">Wat voor categorie past dit product?</label>
                        <input type="text" id="product_category" name="product_category" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                    </div>

                    <div class="mb-4">
                        <label for="loan_duration" class="block text-sm font-medium text-gray-700">Hoelang mag degene jouw product lenen?</label>
                        <select id="loan_duration" name="loan_duration" class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
                            <option value="1">1 dag</option>
                            <option value="3">3 dagen</option>
                            <option value="7">1 week</option>
                            <option value="14">2 weken</option>
                            <option value="30">1 maand</option>
                        </select>
                    </div>

                    <div class="mb-4">
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600">
    Voeg product toe
                    </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
