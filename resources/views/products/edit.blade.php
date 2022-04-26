<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<section class="flex justify-center">
    <form action="{{route('products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
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
        <select name="category" multiple class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0
      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
            <option selected>Select category</option>
            @foreach ($categories as $category)
                <option name="category[]" value="{{$category->id}}" >{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category')
        <div class="text-white bg-red-600 rounded">{{ $message }}</div>
        @enderror
        <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Submit
        </button>

    </form>
</section>
</body>
</html>
