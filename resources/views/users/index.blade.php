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
            @auth
                <a class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                   href="{{route('order.count')}}">Cart({{$count}})</a>
            @endauth
        </x-slot:count>
    </x-navbar>
    <div class="mt-10 flex items-center h-screen w-full justify-center">

        <div class="max-w-xs">
            <div class="bg-gray-100 shadow-xl rounded-lg py-3">

                <div class="flex justify-center">
                <img class="w-10 h-10 rounded-full" src="{{asset('../images/' . Auth::user()->image)}}" alt="image">
                </div>
                <div class="p-2">
                    <h3 class="text-center text-xl text-gray-900 font-medium leading-8">{{Auth::user()->name}}</h3>
                    <div class="text-center text-gray-400font-semibold">
                        <p>Customer</p>
                    </div>
                    <table class="my-3">
                        <tbody><tr>
                            <td class="px-2 py-2 text-gray-500 font-semibold">Address</td>
                            <td class="px-2 py-2">{{Auth::user()->address}}</td>
                        </tr>
                        <tr>
                            <td class="px-2 py-2 text-gray-500 font-semibold">Phone</td>
                            <td class="px-2 py-2">{{Auth::user()->phone}}</td>
                        </tr>
                        <tr>
                            <td class="px-2 py-2 text-gray-500 font-semibold">Email</td>
                            <td class="px-2 py-2">{{Auth::user()->email}}</td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="text-center my-3">
                        <a class=" text-indigo-500 italic hover:underline hover:text-indigo-600 font-medium" href="{{route('users.edit', Auth::user()->id)}}">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-layout>
