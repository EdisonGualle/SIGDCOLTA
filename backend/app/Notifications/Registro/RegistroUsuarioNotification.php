<?php

namespace App\Notifications\Registro;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RegistroUsuarioNotification extends Notification
{

    protected $primerNombre;
    protected $primerApellido;
    protected $usuario;
    protected $correo;
    protected $password;

    public function __construct($primerNombre, $primerApellido, $usuario, $correo, $password)
    {
        $this->primerNombre = $primerNombre;
        $this->primerApellido = $primerApellido;
        $this->usuario = $usuario;
        $this->correo = $correo;
        $this->password = $password;
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('¡Bienvenido a la plataforma SIGCOLTA!')
            ->greeting('¡Hola ' . $this->primerNombre . ' ' . $this->primerApellido . '!')
            ->line('Tu cuenta ha sido creada satisfactoriamente.')
            ->line('A continuación, encontrarás los detalles de tu cuenta:')
            ->line('Usuario: ' . $this->usuario)
            ->line('Correo: ' . $this->correo)
            ->line('Contraseña: ' . $this->password)
            ->line('Por favor, cambia tu contraseña después de iniciar sesión por primera vez.')
            ->action('Iniciar Sesión', url('/api/ingresar'))
            ->line('¡Gracias por ser parte de nuestro GAD Municipal Colta!');
    }

    public function via($notifiable)
    {
        return ['mail'];
    }
}
