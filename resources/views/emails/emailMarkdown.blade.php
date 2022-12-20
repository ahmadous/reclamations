<x-mail::message>
# Introduction

<br>
Motif:
<br>
{{$data['Motif']}}

<x-mail::button :url="'http://127.0.0.1:8000'">
 faire une nouvelle demande
</x-mail::button>

Merci,<br>
{{ config('app.name') }}
</x-mail::message>
