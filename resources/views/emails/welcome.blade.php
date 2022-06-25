@component('mail::message')

<h1>Mail sent from ShopNest</h1> <br>

Thank you for subscribing to our eShop!
@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Visit our Eshop
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
