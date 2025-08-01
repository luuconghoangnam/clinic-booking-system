<?php

namespace Controller\Mail;

use App\Http\Controllers\Controller;
use App\Mail\ConfirmBook;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {

        $data = Mail::to($request->email)->send(new ConfirmBook($request));

        return $this->success($data);
    }
}
