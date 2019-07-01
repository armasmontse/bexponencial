<?php
namespace App\Models\Traits\User;

use Illuminate\Notifications\Notifiable;
use App\Notifications\Client\ResetPasswordNotification;

trait CltvoNotifiable {

	use Notifiable;
	/**
     * Route notifications for the mail channel.
     *
     * @return string
     */
    public function routeNotificationForMail()
    {
        return $this->email;
    }

	/**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

}
