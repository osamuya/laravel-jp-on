<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BaseMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($options, $data)
    {
      $this->options = $options;
      $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->from($this->options['from'], $this->options['from_jp'])
          ->subject($this->options['subject'])
          ->bcc($this->options['bcc'])
          ->with($this->data)
          ->view($this->options['template']);
    }
}
