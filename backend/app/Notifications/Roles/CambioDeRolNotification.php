<?php

namespace App\Notifications\Roles;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class CambioDeRolNotification extends Notification
{
    protected $usuario;
    protected $rolesAntes;
    protected $rolesDespues;

    public function __construct($usuario, $rolesAntes, $rolesDespues)
    {
        $this->usuario = $usuario;
        $this->rolesAntes = $rolesAntes;
        $this->rolesDespues = $rolesDespues;
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Cambio de Rol')
            ->greeting('Hola !')
            ->line('Queremos informarte que se ha realizado un cambio de rol para el usuario ' . $this->usuario->usuario)
            ->line('Rol antes del cambio: ' . $this->implodeArray($this->rolesAntes))
            ->line('Nuevo rol: ' . $this->implodeArray($this->rolesDespues))
            ->action('Ingresar al sistema', url('/api/ingresar'))
            ->line('Agradecemos tu dedicación y compromiso como miembro del equipo del GAD Municipal de Colta.');
    }

    protected function implodeArray($array, $forMessage = false)
    {
        if (is_array($array)) {
            $result = implode(', ', $array);
            return $forMessage ? $result : $result;
        }
    
        return $array; // Si no es un array, devolver el valor tal cual
    }

    public function via($notifiable)
    {
        return ['mail'];
    }
}
