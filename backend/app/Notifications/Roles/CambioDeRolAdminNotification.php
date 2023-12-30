<?php

namespace App\Notifications\Roles;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class CambioDeRolAdminNotification extends Notification
{
    protected $usuario;
    protected $rolesAntes;
    protected $rolesDespues;

    public function __construct($usuario, $rolesAntes, $rolesDespues){
        $this->usuario = $usuario;
        $this->rolesAntes = $rolesAntes;
        $this->rolesDespues = $rolesDespues;
    }
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Cambio de Rol para ' . $this->usuario->name)
            ->greeting('Hola !')
            ->line('Queremos informarte que se ha realizado un cambio de rol para el usuario ' . $this->usuario->usuario)            ->line('Rol antes del cambio: ' . $this->implodeArray($this->rolesAntes))
            ->line('Nuevo rol: ' . $this->implodeArray($this->rolesDespues))
            ->line('Esta notificación actúa como constancia del cambio de rol en el sistema.');
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    protected function implodeArray($array)
    {
        if (is_array($array)) {
            return implode(', ', $array);
        }

        return $array;
    }
}
