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

            <form class="bg-white p-8 mt-6 mb-0 space-y-4 rounded-lg shadow-2xl" action="{{route('products.store')}}"
                  method="POST" enctype="multipart/form-data">
                @csrf
                <p class="text-center text-blue-500 text-3xl">Add a new Product</p>
                <div class="">
                    Product title:
                    <input value="{{ old('title') }}" type="text" name="title" class="
        @error('title') border-red-300  @enderror
                        mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                @error('title')
                <div class="text-red-500">{{ $message }}</div>
                @enderror
                <div class="">
                    Product excerpt:
                    <input value="{{ old('excerpt') }}" type="text" name="excerpt" class="
            @error('excerpt') border-red-300  @enderror
                        mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                @error('excerpt')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
                <div class="">
                    Product description:
                    <input value="{{ old('description')}}" type="text" name="description" class="
            @error('description') border-red-300  @enderror
                        mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                @error('description')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
                <div class="">
                    Product price:
                    <input value="{{ old('price')}}" type="text" name="price" class="
            @error('price') border-red-300  @enderror
                        mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                @error('price')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
                <div class="">
                    Select picture:
                    <input value="{{ old('image')}}" type="file" name="image" class="
            @error('image') border-red-300  @enderror
                        mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                @error('image')
                <p class="text-red-500">{{ $message }}</p>
                @enderror

                <select name="category[]" multiple class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0
      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                    <option selected>Select category</option>
                    @foreach ($categories as $category)
                        <option name="category[]" value="{{$category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category')
                <div class="text-white bg-red-600 rounded">{{ $message }}</div>
                @enderror
                Add Tags:
                <input
                    class="mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" id="tags" name="tags">
                <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Submit
                </button>
            </form>

            @if(session()->has('addedProduct'))
                <div
                    x-data="{show: true}"
                    x-init="setTimeout(() => show = false,4000)"
                    x-show="show"
                    class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3">
                    <p>{{session('addedProduct')}}</p>
                </div>
            @endif
        </div>
    </div>

</x-app-layout>
