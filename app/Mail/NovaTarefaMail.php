<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Tarefa;

class NovaTarefaMail extends Mailable
{
    use Queueable, SerializesModels;
     public $tarefa;
         public $url;



    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Tarefa $tarefa)
    {
        $this->tarefa = $tarefa;
        $this->url = route('tarefa.show', ['tarefa' => $tarefa->id]);  // <-- Aqui gerando a URL

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nova Tarefa Criada')
                    ->markdown('emails.nova-tarefa')
                 ->with([
                        'tarefa' => $this->tarefa,
                        'url' => $this->url
                    ]);
    
    }
}
