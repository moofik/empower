<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsFeedback;
use App\Mail\UserFeedbackMessage;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Http\JsonResponse;

class FeedbackController extends Controller
{
    /**
     * @param ContactUsFeedback $request
     * @param Mailer $mailer
     * @return JsonResponse
     */
    public function sendFeedbackEmail(ContactUsFeedback $request, Mailer $mailer): JsonResponse
    {
        $mail = (new UserFeedbackMessage($request))->onQueue('default');

        $mailer
            ->to(config('mail.from.address'))
            ->queue($mail);

        return new JsonResponse();
    }
}
