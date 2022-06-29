<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{route('dashboard')}}">{{ __('Dashboard') }}</a>
            <a class="p-3" href="{{ route('welcome') }}">Home</a>
        </h2>
    </x-slot>

    <div class="max-w-screen-xl px-4 py-16 mx-auto sm:px-6 lg:px-8">
        <div class="max-w-lg mx-auto">

            <form class="bg-white p-8 mt-6 mb-0 space-y-4 rounded-lg shadow-2xl"
                  action="{{route('products.update',$product->id)}}" method="POST" enctype="multipart/form-data">

                <h1 class="text-3xl text-blue-500 text-center">Edit product</h1> <br>
                @method('PATCH')
                @csrf

                <div class="mb-6">
                    Product title: <br>
                    <input value="{{ $product->title }}" type="text" name="title"
                           class="mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-6">
                    Product excerpt: <br>
                    <input value="{{ $product->excerpt }}" type="text" name="excerpt"
                           class="mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                @error('excerpt')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
                <div class="mb-6">
                    Product description: <br>
                    <input value="{{$product->description}}" type="text" name="description"
                           class="mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                @error('description')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
                <div class="mb-6">
                    Product price: <br>
                    <input value="{{$product->price}}" type="text" name="price"
                           class="mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                @error('price')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
                <div class="mb-6">
                    <p>Upload an image</p>
                    <div class="m-5 text-white p-6 max-w-sm bg-white rounded-lg border border-white shadow-md ">

                        <img src="{{asset('../images/' . $product->image)}}" alt="image">
                        <input value="{{$product->image}}" type="file" name="image">
                    </div>

                </div>
                <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Submit
                </button>

            </form>
        </div>
    </div>
</x-app-layout>


