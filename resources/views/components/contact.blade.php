@auth
<div class="max-w-screen-xl px-4 py-16 mx-auto sm:px-6 lg:px-8">

<div id="revue-embed" class="p-4 my-8 overflow-hidden text-white lg:grid bg-gradient-to-r from-indigo-500 to-purple-900 border rounded border-gray-200 shadow-md sm:p-6 lg:p-8 ">
    <h3 class="mb-3 text-xl font-medium ">Get more updates...</h3>
    <p class="mb-5 text-sm font-medium ">Do you want to get notified when a new component is added to Flowbite? Sign up for our newsletter and you'll be among the first to find out about new features, components, versions, and tools.</p>
    <form action="{{route('email.send')}}" method="post" id="revue-form" name="revue-form">
        @method('POST')
        @csrf
        <div class="flex items-end mb-3">
            <div class="relative mr-3 w-full revue-form-group">
                <label for="member_email" class="block hidden mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email address</label>
                <input class="revue-form-field bg-gray-50 border border-gray-100 text-blue-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-white-700 dark:border-black-600 dark:placeholder-black-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter email" type="email" name="email" id="member_email" required="">
            </div>
            <div class="revue-form-actions">
                <input type="submit" value="Subscribe" class="cursor-pointer text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="member[subscribe]" id="member_submit">
            </div>
        </div>
        <div class="text-sm font-medium revue-form-footer">By subscribing, you agree with Revue’s <a rel="nofollow" href="https://www.getrevue.co/terms" class="text-blue-600 hover:underline dark:text-blue-500">Terms of Service</a> and <a rel="nofollow" class="text-blue-600 hover:underline dark:text-blue-500" href="https://www.getrevue.co/privacy">Privacy Policy</a>.</div>
    </form>
</div>
</div>
@endauth
