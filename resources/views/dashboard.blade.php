<x-app-layout>
<x-sidebar>

</x-sidebar>
    @if(session()->has('created'))
        <div
            x-data ="{show: true}"
            x-init="setTimeout(() => show = false,4000)"
            x-show="show"
            class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3">
            <p>{{session('created')}}</p>
        </div>
    @endif


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
            <a class="p-3" href="{{ route('welcome') }}">Home</a>
        </h2>
    </x-slot>
    <div class="mt-10 bg-white  max-w-screen-xl px-4 py-8 mx-auto sm:py-12 sm:px-6 lg:px-8">
        <div class="sm:justify-center sm:items-center sm:flex">
            <div class="text-center sm:text-left">
                <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">
                    Welcome back to your dashboard {{Auth::user()->name}} !
                </h1>
            </div>
        </div>
    </div>
</x-app-layout>

