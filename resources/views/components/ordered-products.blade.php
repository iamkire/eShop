@props(['order'])
<tr class="bg-gray-50">
    <td class="p-5">{{$order->name}}</td>
    <td class="p-5">{{$order->email}}</td>
    <td class="p-5">{{$order->product_name}}</td>
    <td class="p-5">{{$order->quantity}}</td>
    <td class="p-5">${{$order->price}}</td>
    <td id='status' class="p-5">{{$order->status}}</td>
            <td class="p-5"><a id='allow-btn' href="{{route('order.status',$order->id)}}"
                               class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Allow</a>
            </td>
    <form action="{{route('order.delete',$order->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <td class="p-5"><input type="submit" name="delete" value="Delete"
                               class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
        </td>
    </form>
</tr>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

