<?php

namespace App\Jobs;

use App\Notifications\NotificationMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class EmailNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    /**
     * Determina quantas vezes a fila irá tentar executar o Job.
     *
     * @var integer
     */
    public $tries = 2;

    /**
     * Guarda o array com os dados do usuário.
     *
     * @var [array] $data
     */
    private $data;


    /**
     *
     * Quando o Job é instanciado, ele joga o parâmetro para dentro do atributo.
     * @param [array] $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Executa o Job.
     *
     * @return void
     */
    public function handle()
    {

        Notification::route('mail',$this->data['email'])->notify(new NotificationMail($this->data));
    }
}
