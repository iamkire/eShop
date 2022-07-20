@props(['comments'])
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
