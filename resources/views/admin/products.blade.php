<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{route('dashboard')}}">{{ __('Dashboard') }}</a>
            <a class="p-3" href="{{ route('welcome') }}">Home</a>
        </h2>
    </x-slot>


    <x-sidebar>

    </x-sidebar>


    @if($products->count() > 0)
        <div class="max-w-lg mx-auto text-center mt-10">
            <h2 class="p-5 text-3xl font-bold sm:text-4xl">Manage your products</h2>
        </div>

        <section class="flex flex-wrap justify-center">
            @foreach($products as $product)

                <div
                    class="m-5 text-white p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md">
                    <a href="#">
                        <img class="" src="{{asset('../images/' . $product->image)}}" alt=""/>
                    </a>
                    <div class="p-3">

                        <h5 class="h-10 mb-2 text-1xl font-bold tracking-tight text-gray-900">{{$product->title}}</h5>

                        <p class="h-25 mb-3 font-normal text-gray-700 dark:text-gray-400">{{$product->excerpt}}</p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$product->description}}</p>
                        <div class="flex justify-center">
                            <form action="{{route('products.edit',$product->id)}}" method="POST">
                                @csrf
                                @method('GET')
                                <input
                                    class="focus:outline-none text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-900"
                                    type="submit" name="edit" value="Edit">
                            </form>
                            <form action="{{route('products.delete',$product->id)}}" method="POST">
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
                                No products yet, {{Auth::user()->name}}
                            </h1>
                        </div>
                        <a href="{{route('products.create')}}">
                            <button
                                class="block px-5 py-3 text-md font-medium text-white transition bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring"
                                type="button">
                                Add new product
                            </button>
                        </a>
                    </div>
                </div>
            @endif
                <x-flash-message></x-flash-message>

                <x-flash-message class="bg-red-500"></x-flash-message>
        </section>
</x-app-layout>
