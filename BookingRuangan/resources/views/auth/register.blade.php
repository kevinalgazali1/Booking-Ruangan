<x-guest-layout>
    <div class="p-8">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Create Account</h2>
            <p class="text-gray-600">Join us to start booking amazing spaces</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Full Name')" class="text-gray-700 font-semibold mb-2" />
                <div class="relative">
                    <x-text-input id="name" 
                        class="input-field block w-full pl-12 pr-4 py-3 rounded-xl" 
                        type="text" 
                        name="name" 
                        :value="old('name')" 
                        required 
                        autofocus 
                        autocomplete="name"
                        placeholder="John Doe" />
                </div>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-semibold mb-2" />
                <div class="relative">
                    <x-text-input id="email" 
                        class="input-field block w-full pl-12 pr-4 py-3 rounded-xl" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required 
                        autocomplete="username"
                        placeholder="you@example.com" />
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- WhatsApp Number -->
            <div>
                <x-input-label for="no_wa" :value="__('WhatsApp Number')" class="text-gray-700 font-semibold mb-2" />
                <div class="relative">
                    <x-text-input id="no_wa" 
                        class="input-field block w-full pl-12 pr-4 py-3 rounded-xl" 
                        type="text" 
                        name="no_wa" 
                        :value="old('no_wa')" 
                        required 
                        autocomplete="no_wa"
                        placeholder="+62 812 3456 7890" />
                </div>
                <x-input-error :messages="$errors->get('no_wa')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-semibold mb-2" />
                <div class="relative">
                    <x-text-input id="password" 
                        class="input-field block w-full pl-12 pr-4 py-3 rounded-xl"
                        type="password"
                        name="password"
                        required 
                        autocomplete="new-password"
                        placeholder="Min. 8 characters" />
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700 font-semibold mb-2" />
                <div class="relative">
                    <x-text-input id="password_confirmation" 
                        class="input-field block w-full pl-12 pr-4 py-3 rounded-xl"
                        type="password"
                        name="password_confirmation" 
                        required 
                        autocomplete="new-password"
                        placeholder="Confirm your password" />
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="space-y-4 pt-2">
                <button type="submit" class="btn-primary w-full text-white font-bold py-3 px-4 rounded-xl">
                    Create Account
                </button>
                
                <div class="text-center">
                    <span class="text-gray-600">Already have an account?</span>
                    <a href="{{ route('login') }}" class="text-purple-600 hover:text-purple-800 font-semibold ml-1">
                        Sign in
                    </a>
                </div>
            </div>
        </form>
    </div>
</x-guest-layout>