<x-mail::message>
# Product invoice

The body of your message.

<x-mail::table>
    | Product       | Price  |
    | ------------- | --------:|
    | {{ $product->name }}      | {{ $product->price }}      |
</x-mail::table>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
