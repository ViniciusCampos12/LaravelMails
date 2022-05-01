<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationRequest;
use App\Jobs\EmailNotificationJob;

class NotificationController extends Controller
{
    /**
     * Exibe o formulário para usuário preencher
     *
     * @return view
     */

    public function write()
    {
        return view('email.notification');
    }

     /**
     * Envia a instrução do que é pra ser feito para a tabela da fila
     *
     * @param NotificationRequest $request
     * @return view
     */
    public function sendToJob(NotificationRequest $request)
    {
        $data = $request->all();
        EmailNotificationJob::dispatch($data)->delay(now()->addSeconds(3));

        return redirect()->back();
    }
}
