<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Item Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Item Detail") }}
                    <br><br>
                    <div class="grid grid-cols-2 gap-4">
                        <img src="{{ asset('storage/img/items/'.$item['image']) }}" alt="" class="w-25">
                        <div class="">
                            <div>
                                <h2 class="text-4xl font-semibold">{{ $item['name'] }}</h2><br>
                                Category : <span class="text-gray-500">{{ $item['category'] }}</span>
                                <br><br>
                            Condition : <x-badge
                                variation="{{ $item['item_condition'] == 'NEW' ? 'success' : 'danger' }}">{{$item['item_condition']}}</x-badge>
                                <br><br>
                                Donated by : {{ $user['name'] }}
                                <br><br>
                                {{ $item['description'] }}
                                <br>
                                <a href="{{ 'https://api.whatsapp.com/send?phone=6'.$user['telephone'] }}"
                                    target="_blank" class="btn btn-success mt-3">Whatsapp</a>
                            </div>

                            @if ($item['donor_id'] == Auth::user()->id)
                            <form action="{{ '/donate/'. $item['id'] }}" method="POST" class="mt-4 w-50">
                                @csrf
                                <h3 class="text-green-600 fs-2 mb-2 items-center">Found your receiver?</h3>
                                <select id="receiver_id" required name="receiver_id"
                                    class="border border-gray-300 text-gray-900 text-sm py-1 rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                                    <!-- <option selected>Choose a country</option> -->
                                    @foreach(\App\Models\User::all() as $user)
                                    <option value="{{$user->id}}">{{$user->name}} , ({{$user->id}})</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mt-4">Donate Item</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
