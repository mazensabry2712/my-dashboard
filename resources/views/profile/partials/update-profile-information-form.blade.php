<section class="bg-white shadow-sm rounded-lg border border-gray-200 p-6">
    <header class="mb-6">
        <h2 class="text-xl font-semibold text-gray-900 flex items-center">
            <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-2 text-sm text-gray-600 leading-relaxed">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <!-- Name Field -->
        <div class="space-y-2">
            <x-input-label for="name" :value="__('Name')" class="text-sm font-medium text-gray-700" />
            <x-text-input
                id="name"
                name="name"
                type="text"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400
                       focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500
                       transition-colors duration-200"
                :value="old('name', $user->name)"
                required
                autofocus
                autocomplete="name"
            />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email Field -->
        <div class="space-y-2">
            <x-input-label for="email" :value="__('Email')" class="text-sm font-medium text-gray-700" />
            <x-text-input
                id="email"
                name="email"
                type="email"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400
                       focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500
                       transition-colors duration-200"
                :value="old('email', $user->email)"
                required
                autocomplete="username"
            />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3 p-4 bg-amber-50 border border-amber-200 rounded-md">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-amber-600 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                        <div>
                            <p class="text-sm text-amber-800 font-medium">
                                {{ __('Your email address is unverified.') }}
                            </p>
                            <button
                                form="send-verification"
                                class="mt-2 inline-flex items-center text-sm text-amber-700 hover:text-amber-900
                                       font-medium underline rounded-md focus:outline-none focus:ring-2
                                       focus:ring-offset-2 focus:ring-amber-500 transition-colors duration-200"
                            >
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </div>
                    </div>

                    @if (session('status') === 'verification-link-sent')
                        <div class="mt-3 p-3 bg-green-50 border border-green-200 rounded-md">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <p class="text-sm font-medium text-green-800">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
            @endif
        </div>

        <!-- Submit Button and Status -->
        <div class="flex items-center justify-between pt-4">
            <x-primary-button class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent
                                   rounded-md font-semibold text-xs text-white uppercase tracking-widest
                                   hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900
                                   focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
                                   transition-colors duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                {{ __('Save') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <div
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform translate-x-4"
                    x-transition:enter-end="opacity-100 transform translate-x-0"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 transform translate-x-0"
                    x-transition:leave-end="opacity-0 transform translate-x-4"
                    x-init="setTimeout(() => show = false, 3000)"
                    class="flex items-center text-sm text-green-600 bg-green-50 px-3 py-2 rounded-md border border-green-200"
                >
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="font-medium">{{ __('Saved.') }}</span>
                </div>
            @endif
        </div>
    </form>
</section>
