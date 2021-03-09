<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subscriber as Subscribers;

class Subscriber extends Component
{
    public $search = '';

    protected $queryString = ['search' => ['except' => '']];
    
    /**
     * delete
     *
     * @param  mixed $subscriber
     * @return void
     */
    public function delete(Subscribers $subscriber)
    {
        $subscriber->delete();
    }
    
    /**
     * render
     *
     * @return void
     */
    public function render()
    {
        $subscriber = Subscribers::where('email', 'like', "%{$this->search}%")->get();
        return view('livewire.subscriber',[
            'subscribers' => $subscriber
        ]);
    }
}
