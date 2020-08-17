<?php

namespace Tests\Feature\Feature;

use App\Events\UserWasRegisterd;
use App\Listeners\SendEmailVerificationNotification;
use App\Mail\ActivationSent;
use Illuminate\Events\CallQueuedListener;
use Mail, Queue, Event;
use Tests\TestCase;

class UserRegisterControllerTest extends TestCase
{
    /** @test */
    // public function it_should_push_the_email_to_queue()
    // {
    //     Mail::fake();

    //     $this->post('api/auth/user',$user = [
    //         'name'     => 'mohamed',
    //         'email'    => 'mh124404@gmail.com',
    //         'password' => 'secret'
    //     ])->assertStatus(201);

    //     Mail::assertQueued(ActivationSent::class, function($mail) use ($user){
    //         return $mail->user->email == $user['email'];
    //     });
    // }

    /** @test */
    public function it_should_push_the_email_to_queue()
    {
        // Queue::fake();

        $this->post('api/auth/user',$user = [
            'name'     => 'mohamed',
            'email'    => 'mh124404@gmail.com',
            'password' => 'secret'
        ])->assertStatus(201);

        Queue::assertPushed(CallQueuedListener::class, function($job) use ($user){
            return $job->class === SendEmailVerificationNotification::class;
        });

        // test for job action
        // Queue::assertPushed(Job::class, function($job) use ($user){
        //     return $job->class === SendEmailVerificationNotification::class;
        // });
    }

    /** @test */
    public function it_should_dispatch_the_event_to_regsiterd_user()
    {
        Event::fake();

        $resposne = $this->post('api/auth/user',$user = [
            'name'     => 'mohamed',
            'email'    => 'mh124404@gmail.com',
            'password' => 'secret'
        ])->assertStatus(201);

        Event::assertDispatched(UserWasRegisterd::class, function($event) use ($user){
            return $event->user->email == $user['email'];
        });
    }
}
