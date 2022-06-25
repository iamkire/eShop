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
    <a href="{{route('users.index')}}"><button class="mt-10 ms-10 block px-5 py-3 text-sm font-sm text-white transition bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring" type="button">Go back</button></a>

    <div class="max-w-screen-xl px-4 py-16 mx-auto sm:px-6 lg:px-8">

        <div class="max-w-lg mx-auto">
            <h1 class="text-2xl font-bold text-center text-indigo-600 sm:text-3xl">Edit your profile</h1>

            <p class="max-w-md mx-auto mt-4 text-center text-gray-500">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati sunt dolores deleniti inventore quaerat
                mollitia?
            </p>

            <form action="{{route('users.update', Auth::user()->id)}}" class="p-8 mt-6 mb-0 space-y-4 rounded-lg shadow-2xl" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <div class="relative mt-1">
                    <label for="name" class="text-sm font-medium">Name</label>
                    <input value={{Auth::user()->name}} type="text" name="name"
                           class="w-full p-4 pr-12 text-sm border-gray-200 rounded-lg shadow-sm"/>
                </div>
                <div class="relative mt-1">
                    <label for="email" class="text-sm font-medium">Email</label>
                    <input value={{Auth::user()->email}} type="email" name="email" class="w-full p-4 pr-12 text-sm border-gray-200 rounded-lg shadow-sm"/>
                </div>
                <div class="relative mt-1">
                    <label for="phone" class="text-sm font-medium">Phone Number</label>
                    <input value="{{Auth::user()->phone}}" type="text" name="phone" class="w-full p-4 pr-12 text-sm border-gray-200 rounded-lg shadow-sm"/>
                </div>
                <div class="relative mt-1">
                    <label for="address" class="text-sm font-medium">Address</label>
                    <input value="{{Auth::user()->address}}" type="text" name="address" class="w-full p-4 pr-12 text-sm border-gray-200 rounded-lg shadow-sm"/>
                </div>
                <div>
                <label class="text-sm font-medium" for="image">Choose image:</label>
                <div class="m-5 text-white p-6 max-w-sm bg-white rounded-lg border border-white shadow-md ">
                    <img src="{{asset('../images/' . Auth::user()->image)}}" alt="image">
                    <input value="{{Auth::user()->image}}" type="file" name="image">
                </div>
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

            </form>
        </div>
    </div>
    @if(session()->has('userEdited'))
        <div
            x-data ="{show: true}"
            x-init="setTimeout(() => show = false,4000)"
            x-show="show"
            class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3">
            <p>{{session('userEdited')}}</p>
        </div>
    @endif
</x-layout>
