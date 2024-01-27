<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Item Details') }}
        </h2>
    </x-slot>

    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Item Detail") }}
                    <br><br>
                    <div class="d-flex justify-content-start align-items-top">
                        <img src="{{ asset('storage/img/items/'.$item['image']) }}" alt="" class="w-25">
                        <div class="mx-5 w-full flex justify-between">
                            <div>
                                <h2>{{ $item['name'] }}</h2><br>
                                <span class="text-gray-500">
                                    {{ $item['category'] }}
                                </span>
                                <br><br>
                                Item condition : <span class="text-success">{{ $item['item_condition'] }}</span>
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
                                <h3 class="text-green-600 text-2xl items-center">Found your receiver?</h3>
                                <select id="receiver_id" required name="receiver_id"
                                    class="border border-gray-300 text-gray-900 text-sm py-1 rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                                    <!-- <option selected>Choose a country</option> -->
                                    @foreach(\App\Models\User::all() as $user)
                                    <option value="{{$user->id}}">{{$user->name}} , ({{$user->id}})</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-dark mt-3">Donated</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
