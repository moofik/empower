<?php

namespace App\Mail;

use App\Http\Requests\ContactUsFeedback;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserFeedbackMessage extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    private $name;
    private $phone;
    private $email;
    private $message;

    /**
     * UserFeedbackMessage constructor.
     * @param ContactUsFeedback $feedback
     */
    public function __construct(ContactUsFeedback $feedback)
    {
        $this->name = $feedback->name;
        $this->phone = $feedback->phone;
        $this->email = $feedback->email;
        $this->message = $feedback->message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('New user feedback')
            ->from(config('mail.from.address'), config('mail.from.name'))
            ->markdown('emails.contact-us-email')
            ->with([
                'name' => $this->name,
                'phone' => $this->phone,
                'email' => $this->email,
                'message' => $this->message,
            ]);
    }
}
