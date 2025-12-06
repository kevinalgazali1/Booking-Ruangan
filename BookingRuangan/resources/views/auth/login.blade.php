<x-guest-layout>
    <div class="p-8">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Welcome Back!</h2>
            <p class="text-gray-600">Sign in to continue booking your perfect space</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

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
                        autofocus 
                        autocomplete="username"
                        placeholder="you@example.com" />
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
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
                        autocomplete="current-password"
                        placeholder="Enter your password" />
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between">
                <label for="remember_me" class="inline-flex items-center cursor-pointer">
                    <input id="remember_me" 
                        type="checkbox" 
                        class="rounded border-gray-300 text-purple-600 shadow-sm focus:ring-purple-500 cursor-pointer" 
                        name="remember">
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-sm text-purple-600 hover:text-purple-800 font-semibold" href="{{ route('password.request') }}">
                        Forgot password?
                    </a>
                @endif
            </div>

            <div class="space-y-4">
                <button type="submit" class="btn-primary w-full text-white font-bold py-3 px-4 rounded-xl">
                    Sign In
                </button>
                
                <div class="text-center">
                    <span class="text-gray-600">Don't have an account?</span>
                    <a href="{{ route('register') }}" class="text-purple-600 hover:text-purple-800 font-semibold ml-1">
                        Register now
                    </a>
                </div>
            </div>
        </form>
    </div>
</x-guest-layout>