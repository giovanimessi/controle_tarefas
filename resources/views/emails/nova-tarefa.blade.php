@component('mail::message')
# Nova Tarefa Criada

**Tarefa:** {{ $tarefa->tarefa }}

**Data limite de conclusao:** {{ \Carbon\Carbon::parse($tarefa->data_limite_conclusao)->format('d/m/Y') }}

@component('mail::button', ['url' => $url])
Ver Tarefa
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
