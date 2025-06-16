@component('mail::message')
# Nova Tarefa Criada

**Tarefa:** {{ $tarefa->tarefa }}

**Data limite de conclusao:** {{ \Carbon\Carbon::parse($tarefa->data_limite_conclusao)->format('d/m/Y') }}

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
