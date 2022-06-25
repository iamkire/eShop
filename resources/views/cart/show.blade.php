<x-layout>
    <x-navbar>
        <x-slot:categories>
            @foreach($categories as $cat)
                <li>
                    <a href="/products/category/{{$cat}}"
                       class="bg-gray-700 hover:bg-blue-400 text-white font-bold border-gray-700 hover:border-gray-700 rounded">
                        {{$cat}}
                    </a>
                </li>
            @endforeach
        </x-slot:categories>
        <x-slot:count>
            <a class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
               href="{{route('order.count')}}">Cart({{$count}})</a>
        </x-slot:count>
    </x-navbar>

@if($count > 0)
<div class="p-10 flex justify-center">
    <form action="{{route('order.show')}}" method="POST">
@csrf
        <table class="bg-gray-50 mt-10">
    <tr class="text-xl">
        <td class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Product Name</td>
        <td class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Product Quantity</td>
        <td class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Product Price</td>
        <td class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Remove product</td>
    </tr>

    @foreach($carts as $cart)
        <tbody class="divide-y divide-gray-100">
    <tr class="bg-gray-50">
            <td class="p-5">
            {{$cart->product_title}}
                <input type="hidden" name="productTitle[]" value="{{$cart->product_title}}">
            </td>
            <td class="p-5">
            {{$cart->quantity}}
                <input type="hidden" name="quantity[]" value="{{$cart->quantity}}">

            </td>
            <td class="p-5">
            ${{$cart->price}}
                <input type="hidden" name="price[]" value="{{$cart->price}}">

            </td>
            <td class="p-5">
            <a class="p-2 bg-red-400 text-white text-bold rounded" href="{{route('order.delete',$cart->id)}}">Remove</a>
            </td>
        @endforeach
    </tr>
        </tbody>
</table>
        <a href="{{route('email.send')}}"><input class="mt-3 block px-5 py-3 text-md font-medium text-white transition bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring" type="submit"></a>

        @else
            <div class="mt-10 bg-gray-100  max-w-screen-xl px-4 py-8 mx-auto sm:py-12 sm:px-6 lg:px-8">
                <div class="sm:justify-between sm:items-center sm:flex">
                    <div class="text-center sm:text-left">
                        <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">
                            Looks like cart is empty!
                        </h1>

                    </div>
                    <a href="{{route('welcome')}}"><button class="block px-5 py-3 text-md font-medium text-white transition bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring" type="button">
                        See our products </button></a>
                </div>
            </div>
        @endif
    @if(session()->has('success'))
            <div
                x-data ="{show: true}"
                x-init="setTimeout(() => show = false,4000)"
                x-show="show"
                class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3">
            <p>{{session('success')}}</p>
            </div>
        @endif
    </form>
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
</div>
    @if(session()->has('message'))
        <div
            x-data ="{show: true}"
            x-init="setTimeout(() => show = false,4000)"
            x-show="show"
            class="fixed bg-red-500 text-white py-2 px-4 rounded-xl bottom-3 right-3">
            <p>{{session('message')}}</p>
        </div>
    @endif

</x-layout>

