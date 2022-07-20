@props(['category'])
<div
    class="m-5 text-white p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md">

    <div class="p-3">

        <h5 class="h-10 mb-2 text-1xl font-bold tracking-tight text-gray-900">{{$category->name}}</h5>
        <div class="flex justify-center">
            <form action="{{route('category.edit',$category->id)}}" method="POST">
                @csrf
                @method('GET')
                <input
                    class="focus:outline-none text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-900"
                    type="submit" name="edit" value="Edit">
            </form>
            <form action="{{route('category.delete',$category->id)}}" method="POST">
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
