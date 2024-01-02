<?php

namespace App\Notifications\Roles;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EliminarRolAdminNotification extends Notification
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
            ->subject('Eliminación de Rol para ' . $this->usuario->usuario)
            ->greeting('Hola !')
            ->line('Queremos informarte que se ha eliminado el rol del usuario ' . $this->usuario->usuario)
            ->line('Rol eliminado: ' . $this->implodeArray($this->rolesAntes))
            ->line('Esta notificación actúa como constancia de la eliminación de rol en el sistema.');
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
