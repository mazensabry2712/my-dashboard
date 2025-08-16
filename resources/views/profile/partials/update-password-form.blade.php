<section class="bg-white border border-gray-200 rounded-lg shadow-sm p-6">
    <header class="pb-4 mb-6 border-b border-gray-100">
        <h2 class="text-xl font-semibold text-gray-900 flex items-center">
            <svg class="w-5 h-5 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
            </svg>
            Update Password
        </h2>
        <p class="mt-2 text-sm text-gray-600 leading-relaxed">
            Ensure your account is using a long, random password to stay secure.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div class="space-y-2">
            <x-input-label for="update_password_current_password" :value="__('Current Password')" class="text-sm font-medium text-gray-700 flex items-center" />
            <div class="relative">
                <x-text-input
                    id="update_password_current_password"
                    name="current_password"
                    type="password"
                    class="mt-1 block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm
                           placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500
                           focus:border-blue-500 transition-colors duration-200"
                    autocomplete="current-password"
                    placeholder="Enter current password"
                />
                {{-- <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-1a2 2 0 00-2-2H6a2 2 0 00-2 2v1a2 2 0 002 2zM11 19H9a2 2 0 01-2-2V9a2 2 0 012-2h2m0 0V6a2 2 0 012-2h2a2 2 0 012 2v1m-6 0a2 2 0 002 2h2a2 2 0 002-2m-6 0V4a2 2 0 012-2h2a2 2 0 012 2v3"></path>
                    </svg>
                </div> --}}
            </div>
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <!-- New Password -->
        <div class="space-y-2">
            <x-input-label for="update_password_password" :value="__('New Password')" class="text-sm font-medium text-gray-700 flex items-center" />
            <div class="relative">
                <x-text-input
                    id="update_password_password"
                    name="password"
                    type="password"
                    class="mt-1 block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm
                           placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500
                           focus:border-blue-500 transition-colors duration-200"
                    autocomplete="new-password"
                    placeholder="Enter new password"
                />
                {{-- <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                    </svg>
                </div> --}}
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            <div class="mt-2 text-xs text-gray-500 flex items-center">
                <svg class="w-3 h-3 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Use at least 8 characters with a mix of letters, numbers, and symbols
            </div>
        </div>

        <!-- Confirm Password -->
        <div class="space-y-2">
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" class="text-sm font-medium text-gray-700 flex items-center" />
            <div class="relative">
                <x-text-input
                    id="update_password_password_confirmation"
                    name="password_confirmation"
                    type="password"
                    class="mt-1 block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm
                           placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500
                           focus:border-blue-500 transition-colors duration-200"
                    autocomplete="new-password"
                    placeholder="Confirm new password"
                />
                {{-- <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div> --}}
            </div>
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Submit Button and Status -->
        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
            <x-primary-button class="inline-flex items-center px-6 py-2 bg-blue-600 border border-transparent
                                   rounded-md font-semibold text-xs text-white uppercase tracking-widest
                                   hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900
                                   focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2
                                   transition-colors duration-200 shadow-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                </svg>
                Save
            </x-primary-button>

            @if (session('status') === 'password-updated')
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
                    class="flex items-center text-sm text-green-700 bg-green-50 px-4 py-2 rounded-md border border-green-200 shadow-sm"
                >
                    <svg class="w-4 h-4 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="font-medium">Saved.</span>
                </div>
            @endif
        </div>

        <!-- Security Tips -->
        <div class="mt-6 p-4 bg-blue-50 border border-blue-200 rounded-md">
            <div class="flex items-start">
                <svg class="w-5 h-5 text-blue-600 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                </svg>
                <div>
                    <h4 class="text-sm font-medium text-blue-800 mb-1">Password Security Tips</h4>
                    <ul class="text-sm text-blue-700 space-y-1">
                        <li>• Use a unique password that you don't use elsewhere</li>
                        <li>• Avoid common words, personal information, or patterns</li>
                        <li>• Consider using a password manager for stronger security</li>
                    </ul>
                </div>
            </div>
        </div>
    </form>
</section>
