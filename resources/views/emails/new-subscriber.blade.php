<x-mail::message>
# Introduction

Thanks For Subscribe!.

<x-mail::button :url="route('web.index')">
Visit Our Website
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
