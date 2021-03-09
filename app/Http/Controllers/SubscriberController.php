<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{        
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        return view('dashboard',[
            'subscriber' => Subscriber::all()->count(),
        ]);
    }
    
    /**
     * all subscribers
     *
     * @return void
     */
    public function all()
    {
        return view('dashboard.all');
    }
    
    /**
     * verify subscribers
     *
     * @param  mixed $subscriber
     * @return void
     */
    public function verify(Subscriber $subscriber)
    {
        if (! $subscriber->hasVerifiedEmail()) {
            $subscriber->markEmailAsVerified();
        }

        return redirect('/?verified=1');
    }
}
