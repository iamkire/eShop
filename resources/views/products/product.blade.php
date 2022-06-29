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
        <div class="relative max-w-screen-xl px-4 py-8 mx-auto">
            <div>
                <h1 class="uppercase text-2xl font-bold lg:text-3xl">
                    {{$product->title}}
                </h1>

            </div>

            <div class="grid gap-8 lg:items-start lg:grid-cols-4">
                <div class="lg:col-span-3">
                    <div class="relative mt-4">
                        <img alt="" src="{{asset('../images/' . $product->image)}}"
                             class="w-full rounded-xl h-72 lg:h-[540px] object-cover"/>
                    </div>

                </div>

                <div class="lg:top-0 lg:sticky">
                    <div class="space-y-4 lg:pt-8">
                        <fieldset>
                            <legend class="text-xl font-bold">Description</legend>

                            <div class="flex mt-2 space-x-1">
                                {{$product->excerpt}}
                                {{$product->description}}

                            </div>
                        </fieldset>
                        <div>
                            <p class="text-xl font-bold">
                                Price:
                            </p>
                            ${{$product->price}}

                        </div>
                        <form action="{{route('add-to-cart',$product->id)}}" method="POST">
                            @csrf
                            <p class="text-xl font-bold">
                                Quantity:
                            </p>
                            <input class="w-1/5 text-yellow-400 py-2" type="number" value="1" name="quantity">
                            <input type="hidden" name="product_id" value="{{$product->id}}">

                            <button
                                type="submit"
                                class="w-full px-6 py-3 text-sm font-bold tracking-wide text-white uppercase bg-red-700 rounded"
                            >
                                Add to cart
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @foreach($product->tags as $tag)
        <button type="button"
                class="mx-5 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
            {{$tag->name}}</button>
    @endforeach

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
    <section class="flex justify-center">
        <div class="flex mx-auto items-center justify-center shadow-lg mt-56 mx-8 mb-4 max-w-lg">
            <form action="{{route('comments.store',$product->id)}}" method="POST"
                  class="w-full max-w-xl bg-white rounded-lg px-4 pt-2">
                @csrf
                @method('POST')
                <div class="flex flex-wrap -mx-3 mb-6">
                    <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Leave a comment about this</h2>
                    <div class="w-full md:w-full px-3 mb-2 mt-2">
                        <textarea class="
                        @error('name') border-red-300 @enderror
                            bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                                  name="name" placeholder='Type Your Comment'>

                        </textarea>
                    </div>
                    <div class="w-full md:w-full flex items-start md:w-full px-3">

                        <div class="-mr-1">
                            <input type='submit'
                                   class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100"
                                   value='Post Comment'>
                        </div>
                    </div>
                    @error('name')
                    <p class="text-red-500">{{ 'This field cannot be empty' }}</p>
                @enderror
            </form>
        </div>
        </div>

    </section>
    @foreach($product->comments as $comments)
        <section class="flex justify-center col-span-10 col-start-5 mt-10">
            <article class="w-1/3 flex bg-gray-100 border border-gray-200 p-6 rounded-xl space-x-4">
                <div>
                    <header>
                        <h3 class="font-bold">{{$comments->user->name}}</h3>
                        <p>{{$comments->name}}</p>
                    </header>
                    <p>Posted: {{$comments->created_at->diffForHumans()}}</p>

                </div>
                <div class="flex justify-center">
                    @if(Auth::user()->id == $comments->user_id || Auth::user()->user_type == 1)

                        <div class="grid-cols-3">
                            <div
                                class="text-white mb-6 bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900">
                                <a href="{{route('comments.edit', $comments->id)}}">
                                    Edit
                                </a>
                            </div>
                        </div>
                        <div class="grid-cols-3">
                            <form action="{{route('comments.delete',$comments->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input
                                    class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                    onclick="return confirm('Are you sure?')"
                                    type="submit" name="delete" value="Delete">
                            </form>
                        </div>
                </div>
                </div>
                @endif

            </article>
        </section>

    @endforeach
    @if(session()->has('commentUpdated'))
        <div
            x-data="{show: true}"
            x-init="setTimeout(() => show = false,4000)"
            x-show="show"
            class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3">
            <p>{{session('commentUpdated')}}</p>
        </div>
    @endif
    @if(session()->has('commentDeleted'))
        <div
            x-data="{show: true}"
            x-init="setTimeout(() => show = false,4000)"
            x-show="show"
            class="fixed bg-red-500 text-white py-2 px-4 rounded-xl bottom-3 right-3">
            <p>{{session('commentDeleted')}}</p>
        </div>
    @endif
</x-layout>
