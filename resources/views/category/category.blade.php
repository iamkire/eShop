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
            @if(Auth::check())

                <a class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                   href="{{route('show.count')}}">Cart({{$count}})</a>
            @endif
        </x-slot:count>
    </x-navbar>

    @if(session()->has('message'))
        <button type="button"
                class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
            Product Added
        </button>

@endif
    <section class="flex flex-wrap -mx-1 lg:-mx-4 justify-center">
        @foreach($products as $product)
            <div
                class="m-5 text-white p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                <a href="{{route('products.show',$product->id)}}">
                    <img class="rounded-t-lg" src="{{asset('../images/' . $product->image)}}" alt=""/>
                </a>
                <div class="p-5">
                    <a href="{{route('products.show',$product->id)}}">
                        <h5 class="mb-2 text-1xl font-bold tracking-tight text-gray-900 dark:text-white">{{$product->title}}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$product->excerpt}}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$product->description}}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"> ${{ ($product->price) }} </p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"> Published at {{ ($product->created_at->diffForHumans()) }} </p>
                </div>
            </div>
        @endforeach
    </section>
</x-layout>
