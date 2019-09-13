<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Pedido;


class Pedidos extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     public $pedidos;
    public function __construct($pedidos)
    {
        $this->pedidos = $pedidos;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('pedidos_correo')
        ->subject('¡Tienes un nuevo pedido!')
        ->from('kevin777b@gmail.com');
    }
}
