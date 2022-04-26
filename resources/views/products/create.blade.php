<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link defer rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <script defer src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script defer src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <title>Document</title>
</head>
<body>
<section class="flex justify-center">
    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <p class="text-3xl">Add a new Product</p>
        <div class="">
           Product title:
            <input value="{{ old('title') }}" type="text"  name="title" class="
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
        <h1>Upload an image</h1>
        <input type="file" name="image">

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
        <input class="mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="tags" name="tags">
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(("#tags")).on('keypress', function (e) {
            $.ajaxSetup({
                headers:
                    { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
            $.ajax({
                type: "POST",
                url: "getTags",
                dataType: "json",
                success: function (response) {
                    $.each(response.res, function (key, item) {
                        $("#tags").autocomplete({
                           source: item.name
                        });
                    });
                }
            });
        });

    </script>
    </script>
</section>
</body>
</html>
