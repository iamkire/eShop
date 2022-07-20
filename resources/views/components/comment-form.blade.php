@props(['product'])
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
