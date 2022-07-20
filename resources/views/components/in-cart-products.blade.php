@props(['cart'])


<td class="p-5">
    {{$cart->product_title}}
    <input type="hidden" name="productTitle[]" value="{{$cart->product_title}}">
</td>
<td class="p-5">
    {{$cart->quantity}}
    <input type="hidden" name="quantity[]" value="{{$cart->quantity}}">

</td>
<td class="p-5">
    ${{$cart->price}}
    <input type="hidden" name="price[]" value="{{$cart->price}}">

</td>
<td class="p-5">
    ${{$cart->products->sum('pivot.quantity_ordered')}}
    <input type="hidden" value="">
</td>
<td class="p-5">
    <a class="p-2 bg-red-400 text-white text-bold rounded"
       href="{{route('order.delete',$cart->id)}}">Remove</a>
</td>
