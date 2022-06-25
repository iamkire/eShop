<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{route('dashboard')}}">{{ __('Dashboard') }}</a>
            <a class="p-3" href="{{ route('welcome') }}">Home</a>
        </h2>
    </x-slot>
    <div class="max-w-lg mx-auto text-center mt-10">
        <h2 class="p-5 text-3xl font-bold sm:text-4xl">Manage your products</h2>
    </div>

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
                            onclick="return confirm('Are you sure?')"

                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                            type="submit" name="delete" value="Delete">
                    </form>
                </div>
            </div>
        </div>
    @endforeach
        @if(session()->has('updated'))
            <div
                x-data ="{show: true}"
                x-init="setTimeout(() => show = false,4000)"
                x-show="show"
                class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3">
                <p>{{session('updated')}}</p>
            </div>
        @endif
        @if(session()->has('deleted'))
            <div
                x-data ="{show: true}"
                x-init="setTimeout(() => show = false,4000)"
                x-show="show"
                class="fixed bg-red-500 text-white py-2 px-4 rounded-xl bottom-3 right-3">
                <p>{{session('deleted')}}</p>
            </div>
        @endif
</section>
</x-app-layout>
