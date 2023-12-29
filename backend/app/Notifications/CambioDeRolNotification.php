<?php

namespace App\Notifications;

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
            ->subject('Cambio de Rol en tu cuenta')
            ->greeting('Hola ' . $notifiable->name . '!')
            ->line('Queremos informarte que se ha realizado un cambio de rol para el usuario ' . $this->usuario->usuario)
            ->line('Rol antes del cambio: ' . $this->implodeArray($this->rolesAntes))
            ->line('Nuevo rol: ' . $this->implodeArray($this->rolesDespues))
            ->action('Ver detalles del usuario', url('/usuarios/' . $this->usuario->idUsuario))
            ->line('¡Gracias por ser parte de nuestro servicio! Si tienes alguna pregunta, no dudes en ponerte en contacto con nosotros.')
            ->salutation('Saludos, Rodrigo | Soporte de SIGCOLTA');
    }
    
    

    protected function implodeArray($array)
    {
        if (is_array($array)) {
            return implode(', ', $array);
        }

        return $array; // Si no es un array, devolver el valor tal cual
    }

    public function via($notifiable)
    {
        return ['mail'];
    }
}
