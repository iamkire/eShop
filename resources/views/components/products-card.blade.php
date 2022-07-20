@props(['product'])
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
