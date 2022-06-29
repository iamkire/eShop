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
                   href="{{route('cart.count')}}">Cart({{$count}})</a>
            @endauth
        </x-slot:count>
    </x-navbar>


    <header class="mt-10  bg-gray-50">
        <div class="max-w-screen-xl px-4 py-8 mx-auto sm:py-12 sm:px-6 lg:px-8">
            <div class="sm:justify-between sm:items-center sm:flex">
                <div class="text-center sm:text-left">
                    <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">
                        Welcome to your profile, {{Auth::user()->name}}!
                    </h1>

                    <p class="mt-1.5 text-sm text-gray-500">
                    </p>
                </div>
            </div>
        </div>
        </div>
    </header>
    <div class="flex mt-10 items-center justify-center">
        <div class="w-1/3">
            <div class="bg-gray-50  w-100 p-10 shadow-xl rounded-lg py-3">

                <div class="flex justify-center">
                    <img class="w-20 h-20 rounded-full" src="{{asset('../images/' . Auth::user()->image)}}" alt="image">
                </div>
                <div class="p-2">
                    <h3 class="text-center text-4xl  font-medium leading-8">{{Auth::user()->name}}</h3>

                    <table class="my-3">
                        <tbody>
                        <tr>
                            <td class=" py-2 text-xl font-semibold">Address:</td>
                            <td class=" py-2 text-xl font-semibold">{{Auth::user()->address}}</td>
                        </tr>
                        <tr>
                            <td class=" py-2 text-xl font-semibold">Phone:</td>
                            <td class=" py-2 text-xl font-semibold">{{Auth::user()->phone}}</td>
                        </tr>
                        <tr>
                            <td class=" py-2 text-xl font-semibold">Email:</td>
                            <td class=" py-2 text-xl font-semibold">{{Auth::user()->email}}</td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="text-center my-3">
                        <a class="text-white bg-blue-500 py-2 px-4 rounded italic hover:underline hover:text-white font-medium"
                           href="{{route('users.edit', Auth::user()->id)}}">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-layout>
