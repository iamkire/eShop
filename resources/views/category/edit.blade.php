<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{route('dashboard')}}">{{ __('Dashboard') }}</a>
            <a class="p-3" href="{{ route('welcome') }}">Home</a>
        </h2>
    </x-slot>


    <x-sidebar>

    </x-sidebar>
    <div class="max-w-screen-xl px-4 py-16 mx-auto sm:px-6 lg:px-8">
        <div class="max-w-lg mx-auto">

            <form class="bg-white p-8 mt-6 mb-0 space-y-4 rounded-lg shadow-2xl"
                  action="{{route('category.update', $category->id)}}" method="POST">
                <h1 class="text-center text-blue-500 text-3xl">Edit Category</h1>

                @csrf
                @method('PUT')
                <br>
                <input type="text" name="name"
                       class="mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       value="{{$category->name}}">

                <input type="submit"
                       class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                       placeholder="Submit">
            </form>
        </div>
    </div>
    @if(session()->has('categoryUpdated'))
        <div
            x-data="{show: true}"
            x-init="setTimeout(() => show = false,4000)"
            x-show="show"
            class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3">
            <p>{{session('categoryUpdated')}}</p>
        </div>
    @endif
</x-app-layout>
