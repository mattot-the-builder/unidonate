<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Items') }}
        </h2>
    </x-slot>


    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Browse items!") }}
                    <br>
                    <div class="w-50">
                        <form class="d-flex" role="search" method="post" action="/search-item">
                            @csrf
                            <input class="form-control me-2" placeholder="Search" aria-label="Search" name="name">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>

                    <a href="{{route('item.my')}}" class="btn btn-primary mt-2">My Items</a>
                </div>
            </div>
        </div>
    </div>


    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mxauto">
            <div class="row d-flex justify-content-start">

                @foreach ($items as $item)
                <div class="col-6 px-3 py-3">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900k d-flex align-items-center justify-content-start">
                            <img src="{{ 'storage/img/items/'.$item['image'] }}" alt="" class="col-3">
                            <div class="mx-3">
                                <h3>{{ $item['name'] }}</h3>
                                <p>{{ $item['category'] }}</p>
                                <p class="text-muted">{{ $item['created_at']->diffForHumans() }}</p>
                                <p class="text-success">
                                    {{ $item['item_condition'] }}
                                </p>
                            </div>
                            <div class="ms-auto">
                                <a href="{{ '/item/'.$item['id'] }}" class="btn btn-primary btn-lg">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                {{ $items->links() }}

            </div>
        </div>
    </div>






</x-app-layout>
