<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Jobs\EmailMailableJob;

class MailController extends Controller
{
    /**
     * Exibe o formulário para usuário preencher
     *
     * @return view
     */
    public function write()
    {
        return view('email.mailable');
    }

    /**
     * Envia a instrução do que é pra ser feito para a tabela da fila
     *
     * @param MailRequest $request
     * @return route
     */
    public function sendToJob(MailRequest $request)
    {
        $data = $request->all();
        EmailMailableJob::dispatch($data)->delay(now()->addSeconds(3));

        return redirect()->back();
    }
}
