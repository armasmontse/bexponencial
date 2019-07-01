<?php

namespace App\Notifications\Users;

use Illuminate\Notifications\Messages\MailMessage;

use Illuminate\Support\Facades\Log;
use App\Notifications\CltvoNotification;

class SubscriberPlanNotification extends CltvoNotification
{
	/**mail_greeting
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiablemail_greeting
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->from( $this->from_email, $this->from_name )
            ->success()
            ->view($this->email_new_subscriber)
            ->subject(  $this->trans('subject') )
            ->greeting(   $this->mail_greeting  )
            //->line( $this->getSettingCopy("register") )
            //->action( $this->trans('action'), $notifiable->getActivationAccountUrl() )
            ->line( $this->mail_farawell  );
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
