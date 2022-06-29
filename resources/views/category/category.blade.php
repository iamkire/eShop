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
                   href="{{route('cart.count')}}">Cart({{$count}})</a>
            @endif
        </x-slot:count>
    </x-navbar>

    @if(session()->has('message'))
        <button type="button"
                class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
            Product Added
        </button>

    @endif

    <h2 class="p-5 text-3xl font-bold sm:text-4xl text-center">Products by category</h2>

    <section class="flex flex-wrap  justify-center">
        @foreach($products as $product)
            <div class="m-5 p-6 max-w-sm bg-white rounded-lg border ">

                @if(Auth::check())
                    <a href="{{route('products.show',$product->id)}}">
                        @endif
                        <img class="object-cover w-full -mt-3 h-96" src="{{asset('../images/' . $product->image)}}"
                             alt=""/>
                    </a>


                    <div class="p-5">
                        @if(Auth::check())
                            <a href="{{route('products.show',$product->id)}}">
                                @endif
                                <h2 class="mt-1 text-2xl font-extrabold tracking-wide uppercase lg:text-3xl">
                                    {{$product->title}}
                                </h2></a>
                            <p class="mb-3 font-normal">{{$product->excerpt}}</p>
                            <p class="mb-3 font-normal">{{$product->description}}</p>

                            <div class="flex items-center justify-between mt-4 font-bold">
                                <p class="text-lg">
                                    ${{$product->price}}
                                </p>
                            </div>
                            <p class="mb-3 font-normal text-yellow-700">
                                Published {{ ($product->created_at->diffForHumans()) }} </p>
                    </div>
            </div>
        @endforeach
    </section>
</x-layout>
