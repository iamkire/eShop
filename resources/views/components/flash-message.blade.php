@if(session()->has('message'))
    <div {{$attributes->merge(['class'=> 'fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3'])}}
        {{$slot}}

        x-data="{show: true}"
        x-init="setTimeout(() => show = false,4000)"
        x-show="show">
        <p>{{session('message')}}</p>
    </div>
@endif
