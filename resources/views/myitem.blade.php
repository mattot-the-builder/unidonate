<x-app-layout>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Condition</th>
                                <th scope="col">Donation Status</th>
                                <th scope="col">Complete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <th scope="row">{{ $item['item_id'] }}</th>
                                <td><img src="{{ 'storage/img/items/'.$item['image'] }}" alt="" style="height: 70px;"></td>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ $item['item_condition'] }}</td>
                                <td>{{ $item['status'] }}</td>
                                <td>
                                    <a href="{{ '/donate/'.$item['item_id'] }}" class="btn btn-dark">Donated</a>
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
