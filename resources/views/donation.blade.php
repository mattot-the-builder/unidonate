<x-app-layout>

    @livewireStyles

    <x-status-banner />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Donation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Add donation!") }}
                </div>

            </div>
        </div>
    </div>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="mx-auto">
                    <form class="" href="{{ route('donation.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class="mb-3">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Item Name</label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Item name" required>
                        </div>

                        <div class="mb-3">

                            <label for="categories" class="block mb-2 text-sm font-medium text-gray-900">Select a
                                category</label>
                            <select name="category" id="category"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option selected disabled>Select category</option>
                                <option value="kitchenware">Kitchenware</option>
                                <option value="cleaning">Cleaning</option>
                                <option value="furniture">Furniture</option>
                                <option value="Electronic">Electronic</option>
                            </select>

                        </div>

                        <div class="mb-3 form-group">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Item
                                Description</label>
                            <textarea name="description" id="message" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                                placeholder="Write item description here..."></textarea>
                        </div>

                        <div class="form-check">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Item
                                Condition</label>
                            <input class="ms-2 text-sm font-medium text-gray-900" type="radio" name="item_condition"
                                value="USED" checked>
                            <label for="description" class="mb-2 text-sm font-medium text-gray-900">Used</label>
                            <input class="ms-2 text-sm font-medium text-gray-900" type="radio" name="item_condition"
                                value="NEW">
                            <label for="description" class="mb-2 text-sm font-medium text-gray-900">New</label>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Add image</label>
                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" type="file" name="image" id="image">
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add Item</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    @livewireScripts

    <script>

        let inputField = document.getElementById('image');

        let imageContainer = document.getElementById('imageContainer');

        let file = inputField.files[0];

        let reader = new FileReader();


        reader.addEventListener("load", () => {
            // convert image file to base64 string
            imageContainer.src = reader.result;
        },
            false
        );

        if (file) {
            reader.readAsDataURL(file);
        }

        Livewire.on('fileChoosen', () => {
            let inputField = document.getElementById('image')

            let imageContainer = document.getElementById('imageContainer');

            let file = inputField.files[0];

            let reader = new FileReader();


            reader.addEventListener("load", () => {
                // convert image file to base64 string
                imageContainer.src = reader.result;
            },
                false
            );

            if (file) {
                reader.readAsDataURL(file);
            }

        })
    </script>

</x-app-layout>
