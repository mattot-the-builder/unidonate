<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Items') }}

            @if (session('alert'))
            <div class="mt-3 mb-0 alert alert-success">
                {{ session('alert') }}
            </div>
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ Auth::user()->name }}'s items
                    <br><br>
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500>
                            <thead
                                class=" text-xs text-gray-700 uppercase bg-gray-50>
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Image
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Condition
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Receiver
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                <tr class="bg-white border-b">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $item['id'] }}
                                    </th>
                                    <td class="px-6 py-4">
                                        <img src="{{ 'storage/img/items/'.$item['image'] }}" class="w-48">
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item['name'] }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item['item_condition'] }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if (\App\Models\Item::find($item['receiver_id']))
                                        {{\App\Models\Item::find($item['receiver_id'])->name}}
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <x-button url="{{ '/item/'.$item['id'] }}">
                                            Details
                                        </x-button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
