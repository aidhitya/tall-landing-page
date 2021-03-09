<?php

namespace App\Http\Livewire;

use App\Models\Subscriber;
use Carbon\Carbon;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Livewire\Component;

class LandingPage extends Component
{
    public $email,
        $showSubscribe = false,
        $showSuccess = false;
        
    /**
     * rules validation
     *
     * @var array
     */
    protected $rules  = [
        'email' => 'required|email:filter|unique:subscribers,email'
    ];
        
    /**
     * subscribe model
     *
     * @return void
     */
    public function subscribe()
    {
        $this->validate();

        DB::transaction(function () {
            
            $subscriber = Subscriber::create([
                'email' => $this->email
            ]);
    
            $notification = new VerifyEmail;
            $notification->createUrlUsing(function($notification){
                return URL::temporarySignedRoute(
                    'subscriber.verify',
                    Carbon::now()->addMinutes(30),
                    [
                        'subscriber' => $notification->getKey(),
                    ]
                );
            });
            $subscriber->notify($notification);

        }, 5);


        $this->reset('email');
        $this->showSubscribe = false;
        $this->showSuccess = true;
    }
        
    /**
     * render view
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.landing-page');
    }
}
