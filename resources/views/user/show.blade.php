<x-layout>
    <x-navbar>
        <x-slot:categories>
            @foreach($categories as $cat)
                <li>
                    <a href="/products/category/{{$cat->name}}"
                       class="bg-gray-700 hover:bg-blue-400 text-white font-bold border-gray-700 hover:border-gray-700 rounded">
                        {{$cat->name}}
                    </a>
                </li>
            @endforeach
        </x-slot:categories>
        <x-slot:count>
            <a class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
               href="{{route('show.count')}}">Cart({{$count}})</a>
        </x-slot:count>
    </x-navbar>
@if(session()->has('message'))
    <button type="button" class="text-gray-900 bg-gradient-to-r from-red-200 via-red-400 to-red-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Product Removed</button>
@endif
<div class="p-10 flex justify-center">
    <form action="{{route('show.order')}}" method="POST">
@csrf
        <table>
    <tr class="bg-gray-200">
        <td class="p-5">Product Name</td>
        <td class="p-5">Product Quantity</td>
        <td class="p-5">Product Price</td>
        <td class="p-5">Remove product</td>
    </tr>

    @forelse($carts as $cart)
    <tr class="bg-gray-400">
            <td class="p-5">
            {{$cart->product_title}}
                <input type="hidden" name="productTitle[]" value="{{$cart->product_title}}">
            </td>
            <td class="p-5">
            {{$cart->quantity}}
                <input type="hidden" name="quantity[]" value="{{$cart->quantity}}">

            </td>
            <td class="p-5">
            {{$cart->price}}
                <input type="hidden" name="price[]" value="{{$cart->price}}">

            </td>
            <td class="p-5">
            <a class="p-2 bg-red-600 rounded" href="{{route('delete.order',$cart->id)}}">Remove</a>
            </td>
        @empty
            <p>Cart is empty</p>
        @endforelse
    </tr>
</table>
        @if($count == null)
            <p>Cart empty</p>
        @endif
        <input type="submit" class=" text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
        @if(session()->has('success'))
            <button type="button" class="text-gray-900 bg-gradient-to-r from-green-200 via-red-400 to-green-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Order submitted.</button>
        @endif
    </form>
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
</div>

</x-layout>
