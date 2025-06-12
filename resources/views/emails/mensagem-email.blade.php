@component('mail::message')
# Introdução

O corpo da mensagem.

- Opção 1  
- Opção 2  
- Opção 3

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Texto do botão 1
@endcomponent

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Texto do botão 2
@endcomponent

Obrigado,  
{{ config('app.name') }}
@endcomponent
