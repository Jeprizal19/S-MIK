<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <!-- Kiri -->
    <div class="w-1/2 flex flex-col justify-center px-10 bg-gradient-to-br from-cyan-500 to-blue-400 text-white relative">
        <h1 class="text-4xl font-bold mb-4">Welcome to website</h1>
        <p class="text-sm leading-relaxed">
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
        </p>

        <!-- Bentuk dekorasi garis jep -->
        <div class="absolute bottom-6 left-6 space-y-2">
            <div class="w-24 h-2 bg-gradient-to-r from-blue-300 to-cyan-300 rounded-full"></div>
            <div class="w-16 h-2 bg-gradient-to-r from-blue-300 to-cyan-300 rounded-full"></div>
            <div class="w-32 h-2 bg-gradient-to-r from-blue-300 to-cyan-300 rounded-full"></div>
        </div>
    </div>
    <!-- Form di kannyo -->
    <div class="w-1/2 flex items-center justify-center">
        <form method="POST" action="{{ route('login') }}" class="w-3/4 max-w-sm">
            @csrf
            <h2 class="text-center text-xl font-semibold text-blue-600 mb-6">USER LOGIN</h2>

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-cyan-400" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-cyan-400"
                    type="password"
                    name="password"
                    required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <!-- Remember + Forgot -->
            <div class="flex items-center justify-between text-sm mb-6 mt-4">
                <label class="flex items-center space-x-2">
                    <input type="checkbox" class="form-checkbox text-cyan-500">
                    <span>{{ __('Remember me') }}</span>
                </label>
                @if (Route::has('password.request'))
                <a href="#" class="text-cyan-500 hover:underline">{{ __('Forgot your password?') }}</a>
                @endif
            </div>

            <button type="submit" class="w-full py-2 bg-gradient-to-r from-cyan-500 to-blue-400 text-white font-semibold rounded-lg shadow-md hover:opacity-90 transition">
                {{ __('Log in') }}
            </button>
        </form>
    </div>
</x-guest-layout>