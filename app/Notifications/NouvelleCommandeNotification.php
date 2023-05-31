<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NouvelleCommandeNotification extends Notification
{
    use Queueable;

    /**
     * The new order.
     *
     * @var \App\Models\Commande
     */
    protected $commande;

    /**
     * Create a new notification instance.
     *
     * @param  \App\Models\Commande  $commande
     * @return void
     */
    public function __construct($commande)
    {
        $this->commande = $commande;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the database representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\DatabaseMessage
     */
    public function toDatabase($notifiable)
    {
        return new DatabaseMessage([
            'message' => 'Une nouvelle commande a été créée, Veillez prévalider la commande' . $this->commande->id . ' ',
            'commande_id' => $this->commande->id,
            'url' => route('commande.show', $this->commande->id)
        ]);
    }
}
