<x-app-layout>
    <x-sidebar>

    </x-sidebar>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{route('dashboard')}}">{{ __('Dashboard') }}</a>
            <a class="p-3" href="{{ route('welcome') }}">Home</a>
        </h2>
    </x-slot>

    @if($orders->count() > 0)
        <div class="max-w-lg mx-auto text-center mt-10">
            <h2 class="p-5 text-3xl font-bold sm:text-4xl">Manage your orders</h2>
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 rounded">
                        <div class="flex justify-center">
                            <table>
                                <tr class="text-xl bg-gray-50 p-5">
                                    <td class="p-8">Username</td>
                                    <td class="p-8">Email</td>
                                    <td class="p-8">Title</td>
                                    <td class="p-8">Quantity</td>
                                    <td class="p-8">Price</td>
                                    <td class="p-8">Status</td>
                                    <td class="p-8">Action</td>
                                    <td class="p-8">Remove</td>
                                </tr>
                                @foreach($orders as $order)
                                    <tr class="bg-gray-50">
                                        <td class="p-5">{{$order->name}}</td>
                                        <td class="p-5">{{$order->email}}</td>
                                        <td class="p-5">{{$order->product_name}}</td>
                                        <td class="p-5">{{$order->quantity}}</td>
                                        <td class="p-5">${{$order->price}}</td>
                                        <td class="p-5">{{$order->status}}</td>
                                        <td class="p-5"><a href="{{route('order.status',$order->id)}}"
                                                           class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Allow</a>
                                        </td>
                                        <form action="{{route('order.delete',$order->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <td class="p-5"><input type="submit" name="delete" value="Delete"
                                                                   class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                                            </td>
                                        </form>
                                    </tr>
                                @endforeach
                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div>
            @else
                <div class="mt-10 bg-white  max-w-screen-xl px-4 py-8 mx-auto sm:py-12 sm:px-6 lg:px-8">
                    <div class="sm:justify-between sm:items-center sm:flex">
                        <div class="text-center sm:text-left">
                            <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">
                                No products in cart, {{Auth::user()->name}}
                            </h1>
                        </div>
                        <a href="{{route('welcome')}}#products">
                            <button
                                class="block px-5 py-3 text-md font-medium text-white transition bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring"
                                type="button">
                                Add products
                            </button>
                        </a>
                    </div>
                </div>

            @endif
            @if(session()->has('delivered'))
                <div
                    x-data="{show: true}"
                    x-init="setTimeout(() => show = false,4000)"
                    x-show="show"
                    class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3">
                    <p>{{session('delivered')}}</p>
                </div>
            @endif
            @if(session()->has('orderRemoved'))
                <div
                    x-data="{show: true}"
                    x-init="setTimeout(() => show = false,4000)"
                    x-show="show"
                    class="fixed bg-red-500 text-white py-2 px-4 rounded-xl bottom-3 right-3">
                    <p>{{session('orderRemoved')}}</p>
                </div>
            @endif

        </div>
</x-app-layout>

