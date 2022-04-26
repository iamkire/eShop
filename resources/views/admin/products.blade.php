<x-layout>

<section class="flex flex-wrap -mx-1 lg:-mx-4 justify-center">
    @foreach($products as $product)

        <div
            class="m-5 text-white p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <img class="" src="{{asset('../images/' . $product->image)}}" alt=""/>
            </a>
            <div class="p-3">

                <h5 class="h-10 mb-2 text-1xl font-bold tracking-tight text-gray-900 dark:text-white">{{$product->title}}</h5>

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
                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                            type="submit" name="delete" value="Delete">
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</section>
</x-layout>
