<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VaccineCertificate extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    private $pdf;

    /**
     * Create a new message instance.
     *
     * @param $details
     */
    public function __construct($details,$pdf)
    {
        $this->data = $details;
        $this->pdf = $pdf;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->data['to'])
            ->subject('Bliss HEALTHCARE')
            ->from(config('mail.from.address'), config('mail.from.name'))
            ->replyTo(config('mail.from.address'))
            ->attachData($this->pdf, 'certificate.pdf', [
                'mime' => 'application/pdf',
            ])
            ->markdown('admin.application.send-email');
       // return $this->view('view.name');
    }
}
