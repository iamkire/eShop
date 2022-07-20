<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{route('dashboard')}}">{{ __('Dashboard') }}</a>
            <a class="p-3" href="{{ route('welcome') }}">Home</a>
        </h2>
    </x-slot>
    <x-sidebar></x-sidebar>
    @if($categories->count() > 0)
        <section class="flex flex-wrap justify-center">
            @foreach($categories as $category)
            <x-category-card :category="$category">

            </x-category-card>
            @endforeach
            @else
                <div class="mt-10 bg-white  max-w-screen-xl px-4 py-8 mx-auto sm:py-12 sm:px-6 lg:px-8">
                    <div class="sm:justify-between sm:items-center sm:flex">
                        <div class="text-center sm:text-left">
                            <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">
                                No categories yet, {{Auth::user()->name}}
                            </h1>
                        </div>
                        <a href="{{route('category.create')}}">
                            <button
                                class="block px-5 py-3 text-md font-medium text-white transition bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring"
                                type="button">
                                Add new category
                            </button>
                        </a>
                    </div>
                </div>
            @endif
                <x-flash-message class="bg-red-500"></x-flash-message>
        </section>
</x-app-layout>
