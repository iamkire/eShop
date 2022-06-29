<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{route('dashboard')}}">{{ __('Dashboard') }}</a>
            <a class="p-3" href="{{ route('welcome') }}">Home</a>
        </h2>
    </x-slot>


    <x-sidebar>

    </x-sidebar>
    @if($categories->count() > 0)
        <section class="flex flex-wrap justify-center">
            @foreach($categories as $category)

                <div
                    class="m-5 text-white p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md">

                    <div class="p-3">

                        <h5 class="h-10 mb-2 text-1xl font-bold tracking-tight text-gray-900">{{$category->name}}</h5>
                        <div class="flex justify-center">
                            <form action="{{route('category.edit',$category->id)}}" method="POST">
                                @csrf
                                @method('GET')
                                <input
                                    class="focus:outline-none text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-900"
                                    type="submit" name="edit" value="Edit">
                            </form>
                            <form action="{{route('category.delete',$category->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input
                                    onclick="return confirm('Are you sure?')"

                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                    type="submit" name="delete" value="Delete">
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            @else
                <div class="mt-10 bg-white  max-w-screen-xl px-4 py-8 mx-auto sm:py-12 sm:px-6 lg:px-8">
                    <div class="sm:justify-between sm:items-center sm:flex">
                        <div class="text-center sm:text-left">
                            <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">
                                No categories yet, {{Auth::user()->name}}
                            </h1>
                        </div>
                        <a href="{{route('category.create')}}">
                            <button
                                class="block px-5 py-3 text-md font-medium text-white transition bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring"
                                type="button">
                                Add new category
                            </button>
                        </a>
                    </div>
                </div>
            @endif
            @if(session()->has('categoryRemoved'))
                <div
                    x-data="{show: true}"
                    x-init="setTimeout(() => show = false,4000)"
                    x-show="show"
                    class="fixed bg-red-500 text-white py-2 px-4 rounded-xl bottom-3 right-3">
                    <p>{{session('categoryRemoved')}}</p>
                </div>
    @endif
</x-app-layout>
