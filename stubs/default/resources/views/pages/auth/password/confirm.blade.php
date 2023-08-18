<?php

    namespace App\Http\Livewire\Auth\Passwords;

    use function Laravel\Folio\name;
    use function Livewire\Volt\{state, rules};

    state(['password' => '']);
    rules(['password' => 'required|current_password']);
    name('password.confirm');

    $confirm = function(){
        $this->validate();

        session()->put('auth.password_confirmed_at', time());

        return redirect()->intended('/');
    }
?>

<x-layouts.app>
    <div class="flex flex-col items-stretch justify-center w-screen min-h-screen sm:py-6 sm:items-center">

        <div class="fixed right-0 top-0 mt-4 mr-5">
            <x-ui.light-dark-switch></x-ui.light-dark-switch>
        </div>

        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <x-ui.link href="{{ route('index') }}">
                <x-ui.logo class="w-auto h-10 mx-auto text-gray-700 dark:text-gray-100 fill-current" />
            </x-ui.link>

            <h2 class="mt-6 text-3xl font-extrabold leading-9 text-center text-gray-800">
                Confirm your password
            </h2>
            <p class="mt-2 text-sm leading-5 text-center text-gray-600 max-w">
                Please confirm your password before continuing
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="px-10 py-0 sm:py-8 sm:shadow-sm sm:bg-white sm:border sm:rounded-lg border-gray-200/60">
                @volt('auth.password.confirm')
                    <form wire:submit="confirm" class="space-y-6">
                        <x-ui.input label="Password" type="password" id="password" name="password" wire:model="password" />
                        <div class="flex items-center justify-end text-sm">
                            <x-ui.text-link href="{{ route('password.request') }}">Forgot your password?</x-ui.text-link>
                        </div>
                        <x-ui.button type="primary" submit="true">Confirm password</x-ui.button>
                    </form>
                @endvolt
            </div>
        </div>
    </div>

</x-layouts.app>