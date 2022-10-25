<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;

    protected $formData = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($formData)
    {
        $this->formData = $formData;
    }

    public function build()
    {
        return $this->view('emails.message_contact_form')->with($this->formData);
    }

//    /**
//     * Get the message envelope.
//     *
//     * @return \Illuminate\Mail\Mailables\Envelope
//     */
//    public function envelope()
//    {
//        return new Envelope(
//            subject: 'Contact Form',
//        );
//    }
//
//    /**
//     * Get the message content definition.
//     *
//     * @return \Illuminate\Mail\Mailables\Content
//     */
//    public function content()
//    {
//        return new Content(
//            view: 'emails.contact_form',
//        );
//    }
//
//    /**
//     * Get the attachments for the message.
//     *
//     * @return array
//     */
//    public function attachments($formData)
//    {
//        return ["email"=>$this('email'), "text"=>$this->formdata->text,];
//    }
}
