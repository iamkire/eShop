@component('mail::message')
    <h1>Mail sent from ShopNest</h1> <br>

Thank you for buying from our eShop!
@component('mail::button', ['url' => ''])
Back to site.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
