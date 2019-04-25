<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SendContactEmailNotification extends Notification {
	use Queueable;
	private $content;

	/**
	 * Create a new notification instance.
	 *
	 * @param $content
	 */
	public function __construct($content) {
		$this->content = $content;
	}

	/**
	 * Get the notification's delivery channels.
	 *
	 * @param  mixed $notifiable
	 * @return array
	 */
	public function via($notifiable) {
		return ['mail'];
	}

	/**
	 * Get the mail representation of the notification.
	 *
	 * @param  mixed $notifiable
	 * @return \Illuminate\Notifications\Messages\MailMessage
	 */
	public function toMail($notifiable) {
		return (new MailMessage)
			->from($this->content['email'])

			->subject($this->content['subject'])
			->line($this->content['name'])
			->line($this->content['body']);
	}

	/**
	 * Get the array representation of the notification.
	 *
	 * @param  mixed $notifiable
	 * @return array
	 */
	public function toArray($notifiable) {
		return [
			//
		];
	}
}
