<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>


    <x-status-banner />
    <div class="py-12 pb-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Manage users!") }}
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
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Student ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Kelompok
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Account Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach (\App\Models\User::all() as $user)
                                <tr class="bg-white border-b">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $user['id'] }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $user['name'] }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $user['email'] }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $user['student_id'] }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $user['status'] }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $user['kelompok'] }}
                                    </td>
                                    <td class="px-6 py-4 {{ $user['isActive'] ? 'text-green-600' : 'text-red-600' }}">{{
                                        $user['isActive'] ? 'ACTIVE':'INACTIVE' }}
                                    </td>
                                    <td class="px-6 py-4 flex">
                                        <x-button-danger url="{{route('user.blacklist', $user['id'])}}">
                                            Blacklist
                                        </x-button-danger>
                                        <x-button url="{{route('user.reactivate', $user['id'])}}">
                                            Reactivate
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
