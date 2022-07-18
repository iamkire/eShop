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

    <x-carousel>

    </x-carousel>
    <x-hero>

    </x-hero>

    @if($products->count() == 0)

        <header class=" mt-10">
            <div class="w-1/3 px-4 py-8 mx-auto sm:py-12 sm:px-6 lg:px-8">
                <div class="sm:justify-center sm:items-center sm:flex">
                    <div class="text-center sm:text-left">
                        <h1 class="text-4xl font-bold text-gray-900 sm:text-3xl">
                            @error('notFound')
                            <div>{{ $message }}</div>
                            @enderror
                        </h1>
                    </div>
                </div>
            </div>
        </header>
    @else

        <div class="max-w-lg mx-auto text-center mt-12 p-5">
            <h2 class="p-5 text-3xl font-bold sm:text-4xl">Start shopping now</h2>
            <p class="mt-4">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur
                aliquam doloribus nesciunt eos fugiat. Vitae aperiam fugit consequuntur
                saepe laborum.
            </p>
        </div>
    @endif
    <section id="products" class="flex flex-wrap  justify-center">
        @foreach($products as $product)
            <div class="m-5 p-6 max-w-sm bg-white rounded-lg border">

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
    <x-about-style>

    </x-about-style>
    <x-flash-message></x-flash-message>
    @guest
        <x-aboutus>

        </x-aboutus>
    @endguest
    <x-contact>

    </x-contact>

    <x-flash-message class="bg-red-500"></x-flash-message>
    <x-footer>

    </x-footer>
</x-layout>
