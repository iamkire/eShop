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
            @auth
                <a class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                   href="{{route('cart.count')}}">Cart({{$count}})</a>
            @endauth
        </x-slot:count>
    </x-navbar>


    <section>
    <x-single-product :product="$product"></x-single-product>
    </section>
    @foreach($product->tags as $tag)
        <button type="button"
                class="mx-5 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
            {{$tag->name}}</button>
    @endforeach

    <section class="flex flex-wrap  justify-center">

        @forelse($products as $product)
            <x-products-card :product="$product"></x-products-card>
        @empty
            <div class="mt-10   max-w-screen-xl px-4 py-8 mx-auto sm:py-12 sm:px-6 lg:px-8">
                <div class="sm:justify-between sm:items-center sm:flex">
                    <div class="text-center sm:text-left">
                        <h1 class="text-xl  text-gray-900 sm:text-3xl">
                            Looks like there are no related products!
                        </h1>
                    </div>
                </div>
        @endforelse
    </section>
    <section class="flex justify-center">

   <x-comment-form :product="$product"></x-comment-form>

    </section>
    @foreach($product->comments as $comments)
        <section class="flex justify-center col-span-10 col-start-5 mt-10">
            <article class="w-1/3 flex bg-gray-100 border border-gray-200 p-6 rounded-xl space-x-4">
                <x-product-comments-card :comments="$comments"></x-product-comments-card>
            </article>
        </section>
    @endforeach
    <x-flash-message></x-flash-message>
    <div>
    <x-flash-message class="bg-red-500"></x-flash-message>
    </div>
</x-layout>
