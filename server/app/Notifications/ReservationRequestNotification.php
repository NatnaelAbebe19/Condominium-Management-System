<?php

namespace App\Notifications;

use App\Models\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReservationRequestNotification extends Notification
{
    use Queueable;

    protected $reservation;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Reservation $reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database']; // You can add more channels like 'database', 'broadcast', etc.
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $rental = $this->reservation->rental;
        $user = $this->reservation->user;

        return (new MailMessage)
        ->subject('New Reservation Request')
        ->greeting('Hello ' . $notifiable->name . ',')
        ->line('A new reservation request has been made for your rental.')
        ->line('Reservation Details:')
        ->line('Rental Location: ' . $rental->location)
        ->line('Floor: ' . $rental->floor)
        ->line('Bedrooms: ' . $rental->bedrooms)
        ->line('Price: $' . $rental->price)
        ->line('Requested by: ' . $user->name)
        ->action('View Reservation', url('/reservations/' . $this->reservation->id))
        ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $user = $this->reservation->user;

        // dd($user);

        return [
            'reservation_id' => $this->reservation->id,
            'rental_id' => $this->reservation->rental_id,
            'user_id' => $this->reservation->user_id,
            'status' => $this->reservation->status,
            'message' => 'A new reservation request has been made for your rental.',
            'user_name' => $user->name,
            'user_email' => $user->email,
        ];
    }
}
