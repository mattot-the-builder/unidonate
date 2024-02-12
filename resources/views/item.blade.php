<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Items') }}
        </h2>
    </x-slot>


    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 grid gap-4">
                    {{ __("Browse items!") }}
                    <br>
                    <form class="" role="search" method="post" action="/search-item">
                        @csrf
                        <label for="default-search"
                            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" id="default-search"
                                name="name"
                                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Search Items ..." required>
                            <button type="submit"
                                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 ">Search</button>
                        </div>
                    </form>

                    <div class="mt-auto ms-auto">
                        <x-button url="{{route('item.my')}}">
                            My Item
                        </x-button>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mxauto">
            <div class="row grid grid-cols-2 gap-4">

                @foreach ($items as $item)
                <div class="flex justify-start">
                    <div class="p-4 flex flex-col gap-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <img src="{{ 'storage/img/items/'.$item['image'] }}" alt="" class="h-100">
                        <h3 class="text-2xl font-semibold">{{ $item['name'] }}</h3>
                        <p>
                            Category : {{ $item['category'] }} <br />
                            <span class="text-gray-500 text-sm">Posted {{ $item['created_at']->diffForHumans() }}
                                <br /></span>
                            Condition : <x-badge
                                variation="{{ $item['item_condition'] == 'NEW' ? 'success' : 'danger' }}">{{$item['item_condition']}}</x-badge>
                        </p>
                        <div class="mt-auto ms-auto">
                            <x-button url="{{ '/item/'.$item['id'] }}">
                                More Details
                            </x-button>
                        </div>
                    </div>
                </div>
                @endforeach

                {{ $items->links() }}

            </div>
        </div>
    </div>






</x-app-layout>
