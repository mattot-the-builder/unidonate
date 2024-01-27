<x-app-layout>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg d-flex">
                <div class="col-6">
                    <form class="me-auto ms-5 my-5" href="{{ route('donation.add') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Item Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>

                        <div class="mb-3">
                            <label for="countries"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                                option</label>
                            <select id="category" name="category" class="form-control">
                                <option selected disabled>Select category</option>
                                <option value="kitchenware">Kitchenware</option>
                                <option value="cleaning">Cleaning</option>
                                <option value="furniture">Furniture</option>
                                <option value="Electronic">Electronic</option>
                            </select>
                        </div>

                        <div class="mb-3 form-group">
                            <label for="description" class="form-label">Item Description</label>
                            <textarea class="form-control" rows="3" name="description"></textarea>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="item_condition" value="USED" checked>
                            <label class="form-check-label">
                                Used
                            </label>
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="item_condition" value="NEW">
                            <label class="form-check-label">
                                New
                            </label>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Add image</label>
                            <input class="form-control" type="file" name="image" id="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Add Item</button>

                    </form>
                </div>
                <div class="col-6">

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
