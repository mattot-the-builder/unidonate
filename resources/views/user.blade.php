<x-app-layout>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Student ID</th>
                                <th scope="col">Status</th>
                                <th scope="col">Kelompok</th>
                                <th scope="col">Account</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (\App\Models\User::all() as $user)
                            <tr>
                                <th scope="row">{{ $user['id'] }}</th>
                                <td>{{ $user['name'] }}</td>
                                <td>{{ $user['email'] }}</td>
                                <td>{{ $user['student_id'] }}</td>
                                <td>{{ $user['status'] }}</td>
                                <td>{{ $user['kelompok'] }}</td>
                                <td class="{{ $user['isActive'] ? 'text-green-600' : 'text-red-600' }}">{{
                                    $user['isActive'] ? 'ACTIVE':'INACTIVE' }}</td>
                                <td>
                                    <a href="{{route('user.blacklist', $user['id'])}}" class="btn bg-black text-white">Blacklist</a>
                                    <a href="{{route('user.reactivate', $user['id'])}}" class="btn bg-primary text-white">Reactivate</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>


        </div>
    </div>
</x-app-layout>
