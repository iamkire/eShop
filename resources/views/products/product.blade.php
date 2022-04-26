<x-layout>
    <x-navbar>
    <x-slot:categories>
        <section id="byCategory">
        @foreach($categories as $cat)

            <li id="byCategory">
                <a href="/products/category/{{$cat->name}}"
                   class="bg-gray-700 hover:bg-blue-400 text-white font-bold border-gray-700 hover:border-gray-700 rounded">
                    {{$cat->name}}
                </a>
            </li>
        @endforeach
        </section>
    </x-slot:categories>
    <x-slot:count>
        @if(Auth::check())

            <a class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
               href="{{route('showItems')}}">Cart({{$count}})</a>
        @endif
    </x-slot:count>
    </x-navbar>
        <section class="flex m-5" id="byCategory">
    <div class="m-5 text-white p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <img class="rounded-t-lg" src="{{asset('../images/' . $product->image)}}" alt="" />
        </a>
        <div class="p-5">

                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$product->title}}</h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$product->excerpt}}</p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$product->description}}</p>

            <form action="{{route('addToCart',$product->id)}}" method="POST">
                @csrf
                <input class="w-1/5 text-yellow-400" type="number" value="1" name="quantity">
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <button type ="submit" class="text-white">
                    <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    Add to cart
                </button>
            </form>

        </div>
    </div>
</section>
    <h1 class="text-center text-xl">You might also like</h1>
    @foreach($product->tags as $tag)
        <button type="button" class="mx-5 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">{{$tag->name}}</button>

    @endforeach
    @foreach ($product->categories as $category)
{{--        <button type="button" class="mx-5 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"></button>--}}
{{--        {{$category->name}}--}}
    @endforeach
    @forelse($products as $product)
        <section class="flex flex-wrap -mx-1 lg:-mx-4 justify-center">

            <div class="m-5 text-white p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                @if(Auth::check())
                    <a href="{{route('products.show',$product->id)}}">
                        @endif
                        <img class="rounded-t-lg" src="{{asset('../images/' . $product->image)}}" alt=""/>
                    </a>


                    <div class="p-5">
                        @if(Auth::check())
                            <a href="{{route('products.show',$product->id)}}">
                                @endif
                                <h5 class="mb-2 text-1xl font-bold tracking-tight text-gray-900 dark:text-white">{{$product->title}}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$product->excerpt}}</p>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$product->description}}</p>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"> ${{ ($product->price) }} </p>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"> Published at {{ ($product->created_at->diffForHumans()) }} </p>
                    </div>
            </div>
        </section>
    @empty
        No posts yet.
    @endforelse
    <x-footer>
    </x-footer>
</x-layout>
