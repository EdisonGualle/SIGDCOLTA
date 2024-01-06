<?php

namespace App\Notifications\Roles;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EliminarRolNotification extends Notification
{
    protected $usuario;
    protected $rolesAntes;

    public function __construct($usuario, $rolesAntes)
    {
        $this->usuario = $usuario;
        $this->rolesAntes = $rolesAntes;
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Eliminación de Rol')
            ->greeting('Hola !')
            ->line('Queremos informarte que se ha elimando el rol del usuario '. $this->usuario->usuario)
            ->line('Rol eliminado: ' . $this->implodeArray($this->rolesAntes))
            ->line('Si tienes alguna pregunta o necesitas asistencia, no dudes en ponerte en contacto con nosotros.');
    }

    protected function implodeArray($array)
    {
        if (is_array($array)) {
            return implode(', ', $array);
        }

        return $array;
    }
    public function via($notifiable)
    {
        return ['mail']; 
    }
}
