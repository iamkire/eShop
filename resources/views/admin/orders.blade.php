<x-app-layout>
    <x-sidebar></x-sidebar>

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
                                    <td id='action' class="p-8">Action</td>
                                    <td class="p-8">Remove</td>
                                </tr>

                                @foreach($orders as $order)
                                  <x-ordered-products :order="$order"></x-ordered-products>
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
            <x-flash-message></x-flash-message>
            <x-flash-message class="bg-red-500"></x-flash-message>
        </div>
</x-app-layout>
<script>
    $(document).ready(function(){
        if($("#status").text() == 'Delivered')
            $("#allow-btn").hide();
    })
</script>

