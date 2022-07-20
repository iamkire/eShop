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
