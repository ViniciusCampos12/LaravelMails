<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\NovoMail;

class EmailMailableJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

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
        Mail::to($this->data['email'])->send(new NovoMail($this->data));
    }
}
