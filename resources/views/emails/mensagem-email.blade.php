@component('mail::message')
# Introdu��o

O corpo da mensagem.

- Op��o 1  
- Op��o 2  
- Op��o 3

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Texto do bot�o 1
@endcomponent

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Texto do bot�o 2
@endcomponent

Obrigado,  
{{ config('app.name') }}
@endcomponent
