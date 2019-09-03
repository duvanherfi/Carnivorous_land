<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Comentarios extends Mailable
{
    use Queueable, SerializesModels;

    public $mensaje, $correo, $nombre;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mensaje, $correo, $nombre)
    {
        $this->mensaje = $mensaje;
        $this->correo = $correo;
        $this->nombre = $nombre;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('andres18@gmail.com')
        ->view('correo');
      
    }
}
