<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoCandidato extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($id_vacante, $nombre_vacante, $usuario_id)
    {
        //creando los atributos de esta clase y llenandolos con los parametros que pide desde que se manda a llamar
        $this->id_vacante = $id_vacante;
        $this->nombre_vacante = $nombre_vacante;
        $this->usuario_id = $usuario_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        //especificando que la notificacion se enviar por el mail y guardada en la base de datos
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {  $url = url('/notificaciones');

    
        return (new MailMessage)

                   //contenido del email
                    ->line('Has recibido un nuevo candidato en tu vacante')
                    ->line('la vacante es: ' . $this->nombre_vacante )

                    //boton de el email
                    ->action('Ver notificacion ', $url)
                    ->line('Gracias por elegir DevJobs');
    }
    
    //almacena las notificaciones en la base de datos
    public function toDatabase($notifiable)
    {
       //
       return [
                'id_vacante' => $this->id_vacante,
                'nombre_vacante'=> $this->nombre_vacante,
                'usuario_id' => $this->usuario_id
              ];
    }
}
