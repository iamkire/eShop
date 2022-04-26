<x-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-center">
                        <table>
                            <tr class="text-white bg-gray-700">
                                <td class="p-5">Customer name</td>
                                <td class="p-5">Email</td>
                                <td class="p-5">Product title</td>
                                <td class="p-5">Quantity</td>
                                <td class="p-5">Price</td>
                                <td class="p-5">Status</td>
                                <td class="p-5">Action</td>
                                <td class="p-5">Remove</td>
                            </tr>
                            @foreach($orders as $order)
                                <tr class="bg-gray-300">
                                    <td class="p-5">{{$order->name}}</td>
                                    <td class="p-5">{{$order->email}}</td>
                                    <td class="p-5">{{$order->product_name}}</td>
                                    <td class="p-5">{{$order->quantity}}</td>
                                    <td class="p-5">${{$order->price}}</td>
                                    <td class="p-5">{{$order->status}}</td>
                                    <td class="p-5"><a  href="{{route('update.status',$order->id)}}" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Allow</a></td>
                                    <td class="p-5"><a  href="{{route('delete.order',$order->id)}}" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Clear</a></td>

                                </tr>
                            @endforeach
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <div>

    </div>
</x-app-layout>
</x-layout>
