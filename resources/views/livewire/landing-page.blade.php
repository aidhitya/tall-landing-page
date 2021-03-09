
    <div class="flex flex-col w-full h-screen bg-indigo-900" x-data="{
        showSubscribe: @entangle('showSubscribe'),
        showSuccess: @entangle('showSuccess')
    }">
        <nav class="container flex justify-between py-2 mx-auto text-indigo-200">
            <a href="/" class="justify-center ml-2 text-4xl font-bold hover:text-red-500">
                <x-application-logo class="w-16 h-16 fill-current"></x-application-logo>
            </a>

            <div class="flex justify-end py-3 mr-2">
                @auth
                <a href="{{ route('dashboard') }}" class="p-3 hover:bg-indigo-800 rounded-xl">
                    Dashboard
                </a>
                @else
                <a href="{{ route('login') }}">
                    Login
                </a>
                @endauth
            </div>
        </nav>

        <div class="container flex items-center h-full mx-auto">
            <div class="flex flex-col items-start w-1/3">
                <h1 class="mb-3 text-4xl font-bold text-white leading-thigt">Simple Landing Page with TALL Stack</h1>
                <p class="text-white font-xl mb-9">checking the TALL (Tailwind - Alpine - Livewire - Laravel) Stack works.</p>

                <x-button class="px-8 py-3 bg-red-500 hover:bg-red-600" x-on:click="showSubscribe = true">
                    Subscribe
                </x-button>
            </div>
        </div>

        <x-modal class="bg-pink-500" trigger="showSubscribe">
            <p class="text-5xl font-bold text-center text-white">Let's Do It!</p>
            <form wire:submit.prevent="subscribe" class="flex flex-col items-center p-12">
                    <x-input
                class="px-5 py-3 border border-blue-400 w-80"
                type="email"
                name="email"
                placeholder="Email address"
                wire:model.defer="email"
            ></x-input>
            <span class="font-semibold text-red-100 text-md">
                {{
                    $errors->has('email')
                    ? $errors->first('email')
                    : 'We will send you a confirmation email.'
                }}
            </span>
            <x-button class="justify-center px-5 py-3 mt-5 bg-blue-500 w-80">
                <span class="animate-spin" wire:loading wire:target="subscribe">
                    &#9696;
                </span>
                <span wire:loading.remove wire:target="subscribe">
                    Get In
                </span>
            </x-button>
                </form>
        </x-modal>
        
        <x-modal class="bg-green-500" trigger="showSuccess">
            <p class="font-bold text-center text-white animate-pulse text-9xl">&check;</p>
            <p class="text-5xl font-bold text-center text-white">Great!!</p>
            <p class="text-2xl font-semibold text-center text-white">See You In Your Inbox</p>
        </x-modal>
        
    </div>
