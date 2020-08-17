<?php

namespace App\Listeners;

use App\Events\UserWasRegisterd;
use App\Mail\ActivationSent;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendEmailVerificationNotification implements ShouldQueue {
	use InteractsWithQueue, Queueable;

	/**
	 * shouldQueue
	 *
	 * this function work befor pushed event to queue you can make check in event
	 * return true if you want this event push or false if not
	 *
	 * @param  UserWasRegisterd $event
	 * @return Bool
	 */
	public function shouldQueue($event) {
		return true;
	}

	/**
	 * Handle the event.
	 *
	 * @param  UserWasRegisterd  $event
	 * @return void
	 */
	public function handle(UserWasRegisterd $event) {
		Mail::to($event->user)->send(new ActivationSent($event->user, $event->token));
	}
}
