<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Items') }}
        </h2>
    </x-slot>


    <x-status-banner />
    <div class="py-12 pb-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Manage Items") }}
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500>
                            <thead
                                class=" text-xs text-gray-700 uppercase bg-gray-50>
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Category
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Condition
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Donor
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
                                        {{ $item['name'] }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item['category'] }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item['item_condition'] }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item['donor_id'] }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item['receiver_id'] }}
                                    </td>
                                    <td class="px-6 py-4 flex">
                                        <x-button-danger url="{{ '/delete-item/'.$item['id'] }}">
                                            Blacklist
                                        </x-button-danger>
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
