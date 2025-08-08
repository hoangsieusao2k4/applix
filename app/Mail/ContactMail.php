<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data; // dữ liệu từ form

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $email = $this->subject('Thông tin liên hệ mới')
            ->view('client.emails.contact')
            ->with('data', $this->data);

        // Nếu có file, thì đính kèm
        if (!empty($this->data['file'])) {
            $file = $this->data['file'];
            $email->attach(
                $file->getRealPath(),
                [
                    'as' => $file->getClientOriginalName(), // tên file gốc
                    'mime' => $file->getMimeType()
                ]
            );
        }

        return $email;
    }
}
