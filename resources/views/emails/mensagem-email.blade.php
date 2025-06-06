@component('mail::message')
# Introducao;

Corpo de Mensagem.

@component('mail::button', ['url' => ''])
Texto do Butao
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
